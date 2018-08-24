<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\MemberRequestOpportunity;
use App\Model\MemberOpportunityForm;
use App\Model\InvestmentQuestionnaire;
use App\Model\TotalForms;
use Mail;
use App\Mail\Follow;
use Auth;
use App\Model\MemberDealMatch;
use App\Model\MemberSimpleOpportunity;
use App\Model\MemberSimpleOpportunityMatch;
use App\Model\MemberOpportunityMatch;
use Session;

class DealRoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dealroomview()
    {
        $forms = TotalForms::latest()->get();
        $oppors = [];
        $nums = [];
        $types = [];

        foreach($forms as $form)
        {

            if($form->type == 0 && MemberOpportunityForm::where('id',$form->form_id)->first())
                {
                    if(MemberOpportunityForm::where('id',$form->form_id)->first()->user->is_allowed == 1)
                    {
                        $oppor = MemberOpportunityForm::where('id',$form->form_id)->first();
                        $oppors[] = $oppor;
                        $match = MemberOpportunityMatch::where('opportunity_id', $oppor->id)->get();
                        $nums[$oppor->code]['num_met'] = $match->sum('bmet');
                        $nums[$oppor->code]['num_evaluate'] = $match->sum('bevaluat');
                        $nums[$oppor->code]['num_noevaluate'] = $match->sum('bnoevaluate');
                        $nums[$oppor->code]['num_open'] = $match->sum('bopen');
                        $types[$oppor->code] = 'Co-Invest';
                    }
                }
            elseif($form->type == 1 && InvestmentQuestionnaire::where('id', $form->form_id)->where('is_allowed', 1)->first()){
                $oppor = InvestmentQuestionnaire::where('id', $form->form_id)->where('is_allowed', 1)->first();
                $oppors[] = $oppor;
                $match = MemberDealMatch::where('opportunity_id', $oppor->id)->get();
                $nums[$oppor->code]['num_met'] = $match->sum('bmet');
                $nums[$oppor->code]['num_evaluate'] = $match->sum('bevaluat');
                $nums[$oppor->code]['num_noevaluate'] = $match->sum('bnoevaluate');
                $nums[$oppor->code]['num_open'] = $match->sum('bopen');
                $types[$oppor->code] = 'Deal Rooom';

            }
            elseif($form->type == 2 && MemberSimpleOpportunity::where('id', $form->form_id)->where('is_allowed' ,1)->first())
                {
                    if(MemberSimpleOpportunity::where('id', $form->form_id)->where('is_allowed' ,1)->first()->user->is_allowed == 1)
                    {
                        $oppor = MemberSimpleOpportunity::where('id', $form->form_id)->where('is_allowed', 1)->first();
                        $oppors[] = $oppor;
                        $match = MemberSimpleOpportunityMatch::where('opportunity_id', $oppor->id)->get();
                        $nums[$oppor->code]['num_met'] = $match->sum('bmet');
                        $nums[$oppor->code]['num_evaluate'] = $match->sum('bevaluat');
                        $nums[$oppor->code]['num_noevaluate'] = $match->sum('bnoevaluate');
                        $nums[$oppor->code]['num_open'] = $match->sum('bopen');
                        $types[$oppor->code] = 'Deal Rooom';
                    }
                }

        }
        
        
        return view('pages.member.dealroom')->with(['oppors' => $oppors, 'nums' => $nums, 'types' => $types]);
    }

    public function viewdetail($code)
    {
        if(MemberOpportunityForm::where('code', $code)->first()){
            $oppor = MemberOpportunityForm::where('code', $code)->first();
            if(isset(Session::get('msg')[0])){
                $msg = [Session::get('msg')[0], Session::get('msg')[1],Session::get('msg')[2]];
                return redirect()->route('member.opportunity-detail',['id' => $oppor->id])->with(['msg' => $msg]);
            }
            return redirect()->route('member.opportunity-detail',['id' => $oppor->id]);    
        }
        elseif(InvestmentQuestionnaire::where('code', $code)->first()){
            $oppor = InvestmentQuestionnaire::where('code', $code)->first();
            $usid = Auth::user()->id;
            $matched_oppor = MemberDealMatch::where('matched_member_id', $usid)->where('opportunity_id', $oppor->id)->first();
            if($matched_oppor){
                return view('pages.member.detailinvestmentquestionnaire')->with(['oppor' => $oppor,'matched_oppor' => $matched_oppor]);
            }
            
        }elseif(MemberSimpleOpportunity::where('code', $code)->first()){
            $oppor = MemberSimpleOpportunity::where('code', $code)->first();
            $usid = Auth::user()->id;
            if($oppor->usid == $usid){
                return redirect()->route('member.dealroomopportunity-detail',['id' => $oppor->id]);
            }else{
                $matched_oppor = MemberSimpleOpportunityMatch::where('matched_member_id', $usid)->where('opportunity_id', $oppor->id)->first();
                if($matched_oppor){
                    return view('pages.member.detailsimpledeal')->with(['oppor' => $oppor,'matched_oppor' => $matched_oppor]);
                }
            }
            
        }

        
    }

    public function interestopportunity(Request $request)
    {
        $id = $request['id'];
        $usid = Auth::user()->id;
        $matched_oppor = MemberDealMatch::find($id);
        $matched_oppor->update(['binterest' => 1]);
        

        $to = $matched_oppor->opportunity->email; 
        $to1 = $matched_oppor->matchedMember->email;
        $submittor = $matched_oppor->opportunity->fName.' '.$matched_oppor->opportunity->lName;
        $interested_party = Auth::user()->fName.' '.Auth::user()->lName;
        $subtitle = 'FIVE Network Introduction';
        $subject = 'FIVE Network Introduction';
        $content = 'The FIVE Network would like to connect '.$interested_party.' to '.$submittor.' for the purposes of discussing your potential investment opportunity.<br>Thanks, <br> The FIVE Network';
        $link = '';
        $link_name = 'no';

        Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));
        Mail::to($to1)->send(new Follow($link, $link_name, $content, $subtitle, $subject));

        $msg = ['Success', 'Successfully Expressed your interest','success'];
        return redirect()->route('member.detail-investment-questionnaire',['code' => $matched_oppor->opportunity->code])->with(['msg' => $msg]);
    }

    public function nointerestopportunity(Request $request)
    {
        $id = $request['id'];
        $usid = Auth::user()->id;
        $matched_oppor = MemberDealMatch::find($id);
        $matched_oppor->update(['binterest' => 2]);
        $msg = ['Success', 'Successfully Expressed your no interest','success'];
        return redirect()->route('member.detail-investment-questionnaire',['code' => $matched_oppor->opportunity->code])->with(['msg' => $msg]);
    }

    public function interestsimpledeal(Request $request)
    {
        $id = $request['id'];
        $usid = Auth::user()->id;
        $matched_oppor = MemberSimpleOpportunityMatch::where('matched_member_id', $usid)->where('id', $id)->first();
        $matched_oppor->update(['binterest' => 1]);
        

        $to = $matched_oppor->opportunity->user->email; 
        $to1 = $matched_oppor->matchedMember->email;
        $submittor = $matched_oppor->opportunity->user->fName.' '.$matched_oppor->opportunity->user->lName;
        $interested_party = Auth::user()->fName.' '.Auth::user()->lName;
        $subtitle = 'FIVE Network Introduction';
        $subject = 'FIVE Network Introduction';
        $content = 'The FIVE Network would like to connect '.$interested_party.' to '.$submittor.' for the purposes of discussing your potential investment opportunity.<br>Thanks, <br> The FIVE Network';
        $link = '';
        $link_name = 'no';

        Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));
        Mail::to($to1)->send(new Follow($link, $link_name, $content, $subtitle, $subject));

        $msg = ['Success', 'Successfully Expressed your interest','success'];
        return redirect()->route('member.detail-investment-questionnaire',['code' => $matched_oppor->opportunity->code])->with(['msg' => $msg]);
    }

    public function nointerestsimpledeal(Request $request)
    {
        $id = $request['id'];
        $usid = Auth::user()->id;
        $matched_oppor = MemberSimpleOpportunityMatch::find($id);
        $matched_oppor->update(['binterest' => 2]);
        $msg = ['Success', 'Successfully Expressed your no interest','success'];
        return redirect()->route('member.detail-investment-questionnaire',['code' => $matched_oppor->opportunity->code])->with(['msg' => $msg]);
    }

    public function sendlink(Request $request)
    {
        $email = $request['family_email'];
        $bshare = $request['bshare'];

        $oppor = InvestmentQuestionnaire::create([
            'country' => 'US',
            'code' => $this->generateRandomString(10),
            'is_upload_deal' => $bshare
        ]);

        $link = route('saved-investment-questionnaire', ['code' => $oppor->code]);
        // $link = route('investment-questionnaire');
        $link_name = 'Complete Investment Questionnaire';
        $content = 'Please complete the Investment Questionnaire in this email to share this opportunity with families throughout the US who are looking for opportunities like yours.';
        $subtitle = 'The Family Investment Exchange is interested in your opportunity';
        $subject = 'The Family Investment Exchange is interested in your opportunity';

        Mail::to($email)->send(new Follow($link, $link_name, $content, $subtitle, $subject));
        $msg = ['Success','Successfully Sent Link','success'];

        return redirect()->route('member.dealroom')->with(['msg'=>$msg]);
    }

    public function generateRandomString($length = 6) 
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
