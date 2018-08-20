<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\MemberRequestOpportunity;
use App\Model\MemberOpportunityForm;
use App\Model\MemberOpportunityMatch;
use Mail;
use App\Mail\Follow;
use App\Mail\Highlight;
use App\Model\InvestmentQuestionnaire;
use App\Model\MemberDealMatch;
use App\Model\MemberSimpleOpportunity;
use App\Model\MemberSimpleOpportunityMatch;

class OpportunityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function checkrequest()
    {
        $requests = MemberRequestOpportunity::where('is_accepted',0)->orderBy('created_at','DESC')->get();
        return view('pages.admin.requestopportuniy')->with(['requests' => $requests]);
    }

    public function detailrequestopportunity($id)
    {
        $request = MemberRequestOpportunity::where('id',$id)->first();
        return view('pages.admin.detailrequestopportunity')->with(['request' => $request]);
    }

    public function checkallrequest()
    {
        $requests = MemberRequestOpportunity::orderBy('created_at','DESC')->get();
        return view('pages.admin.checkallrequest')->with(['requests' => $requests]);
    }

    public function allowusersumitopportunity(Request $request)
    {
        $requestopportuniy = MemberRequestOpportunity::where('id', $request['id'])->first();
        $requestopportuniy->is_accepted = 1;
        $requestopportuniy->save();

        // $to = $requestopportuniy->user->email;
        $to = $requestopportuniy->email;
        $subtitle = 'The Family Investment Exchange is interested in your opportunity';
        $subject = 'The Family Investment Exchange is interested in your opportunity';
        $content = 'A member of the Family Investment Exchange has requested we contact you to request additional information on your investment opportunity. Please complete the Investment Questionnaire in this email to share this opportunity with families throughout the US who are looking for opportunities like yours.<br>Best,<br>The Five Network Team.';
        // $link = route('member.investment-questionnaire-form',['code' => $requestopportuniy->code]);
        $link = route('investment-questionnaire-form',['code' => $requestopportuniy->code]);
        $link_name = 'Complete Investment Questionnaire';

        Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));

        $msg = ['Success','Successfully Allowed Member to Submit Opportunity','success'];

        return redirect()->route('admin.requestopportunity-detail',['id'=>$request['id']])->with(['msg' => $msg]);
    }

    public function denyusersumitopportunity(Request $request)
    {
        $requestopportuniy = MemberRequestOpportunity::where('id', $request['id'])->first();
        $requestopportuniy->is_accepted = 2;
        $requestopportuniy->save();

        // $to = $requestopportuniy->user->email;
     //    $subtitle = 'Your opportunity was denied!';
     //    $subject = 'Your opportunity was denied!';
     //    $content = 'Unfortunately your opportunity was denied.';
     //    $link = route('member.submit-opportunity');
     //    $link_name = 'Request Another Opportunity';

     //    Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));

        $msg = ['Success','Successfully Denied Member to Submit Opportunity','success'];
        return redirect()->route('admin.requestopportunity-detail',['id'=>$request['id']])->with(['msg' => $msg]);
    }

    public function analyticsview()
    {
        $oppors = [];$nums = [];
        $requests = MemberRequestOpportunity::where('is_submitted', 1)->orderBy('created_at','DESC')->get();

        if($requests->count() > 0)
            foreach($requests as $request){
                $oppor =  MemberOpportunityForm::where('code', $request->code)->first();
                $oppors[] = $oppor;
                $match = MemberOpportunityMatch::where('opportunity_id', $oppor->id)->get();
                $nums[$oppor->code]['num_met'] = $match->sum('bmet');
                $nums[$oppor->code]['num_evaluate'] = $match->sum('bevaluat');
                $nums[$oppor->code]['num_noevaluate'] = $match->sum('bnoevaluate');
                $nums[$oppor->code]['num_open'] = $match->sum('bopen');
            }
        return view('pages.admin.opportunityanalytics')->with(['oppors' => $oppors, 'nums' => $nums]);
    }

    public function detailopportunity($id)
    {
        $oppor = MemberOpportunityForm::find($id);
        return view('pages.admin.detailopportunity')->with(['oppor' => $oppor]);
    }

    public function checkmatch($id)
    {
        $matchinfo = MemberOpportunityMatch::where('opportunity_id', $id)->orderBy('score', 'desc')->get();
        $oppor_name = MemberOpportunityForm::find($id)->company_name;
        return view('pages.admin.checkmatchdetail')->with(['matchinfo' => $matchinfo, 'name' => $oppor_name, 'oppor_id' => $id]);
    }

    public function approveopportunitymatch(Request $request)
    {
        $id = $request['id'];
        $oppor = MemberOpportunityMatch::find($id);
        $oppor->update(['is_allowed' => 1]);

        $family_email = $oppor->matchedMember->email;
        $oppr_request = MemberRequestOpportunity::where('code', $oppor->Opportunity->code)->first();

        if($oppor->opportunity->prior_year_monthly_finacial) $prior_year_monthly_finacial = $oppor->opportunity->prior_year_monthly_finacial;
        else $prior_year_monthly_finacial = 'No File';

        if($oppor->opportunity->investor_deck) $investor_deck = $oppor->opportunity->investor_deck;
        else $investor_deck = 'No File';

        if($oppor->opportunity->proforma_projections) $proforma_projections = $oppor->opportunity->proforma_projections;
        else $proforma_projections = 'No File';

        if($oppor->opportunity->detailed_cap_table) $detailed_cap_table = $oppor->opportunity->detailed_cap_table;
        else $detailed_cap_table = 'No File';


        $link = route('member.opportunity-detail',['id' => $oppor->opportunity_id]);
        $subject = 'FIVE Network – Co-Investment Opportunity Match';
        $subtitle = 'You have been matched for a Co-Investment Opportunity';
        $content = '<p>A member of the FIVE Network has submitted an opportunity for co-investment. Below are the details submitted:</p><br>
        <ul>
        <li>Company Name: '.$oppor->opportunity->company_name.'</li>
        <li>Company Description: '.$oppor->opportunity->company_desc.'</li>
        <li>Company Headquaters: '.$oppor->opportunity->investmentregion->type.'</li>
        <li>Company Sector: '.$oppor->opportunity->investmentsector->type.'</li>
        <li>Structure: '.$oppor->opportunity->investmentstructure->type.'</li>
        <li>Stage: '.$oppor->opportunity->investmentstage->type.'</li>
        <li>Total Investment Company is looking to Raise: '.$oppor->opportunity->investment_size.'</li>
        <li>Amount Available for FIVE Network members: $'.number_format($oppr_request->valuation, 0, '.',',').'</li>
        <label style="font-weight:bold;">Upload Files :</label>
         <li>PRIOR YEAR MONTHLY FINANCIALS : '.$prior_year_monthly_finacial.'</li>
         <li>INVESTOR DECK : '.$investor_deck.'</li>
         <li>3 YEAR PROFORMA PROJECTIONS : '.$proforma_projections.'</li>
         <li>DETAILED CAP TABLE : '.$detailed_cap_table.'</li>
        </ul>';

        $files = [];
        if($oppor->opportunity->prior_year_monthly_finacial) $files[] = public_path('assets/dashboard/profile/file/').$oppor->opportunity->prior_year_monthly_finacial;
        if($oppor->opportunity->investor_deck) $files[] = public_path('assets/dashboard/profile/file/').$oppor->opportunity->investor_deck;
        if($oppor->opportunity->proforma_projections) $files[] = public_path('assets/dashboard/profile/file/').$oppor->opportunity->proforma_projections;
        if($oppor->opportunity->detailed_cap_table) $files[] = public_path('assets/dashboard/profile/file/').$oppor->opportunity->detailed_cap_table;
        Mail::to($family_email)->send(new Highlight($link, $content, $subject,$subtitle, $files));

        $msg = ['Success', 'Successfully Approved to Send Email with hightlight to family','success'];
        return redirect()->route('admin.check-member-opportunity-match',['id' => $oppor->opportunity_id])->with(['msg' => $msg]);
    }

    public function checknoncoinvestment()
    {
        $niqs = InvestmentQuestionnaire::where('is_completed', 1)->where('is_allowed',0)->where('is_upload_deal', 1)->get();
        $msds = MemberSimpleOpportunity::where('is_allowed', 0)->get();
        return view('pages.admin.checknoninvestmentquestionnaire')->with(['niqs' => $niqs, 'msds' => $msds]);
    }

    public function checkallnoninvestment()
    {
        $niqs = InvestmentQuestionnaire::where('is_completed', 1)->where('is_upload_deal', 1)->get();
        $msds = MemberSimpleOpportunity::all();
        return view('pages.admin.checkallnoninvestmentquestionnaire')->with(['niqs' => $niqs, 'msds' => $msds]);
    }

    public function checknoncodetail($id)
    {
        $niq = InvestmentQuestionnaire::find($id);
        return view('pages.admin.checknoncoinvestmentdetail')->with(['niq' => $niq]);
    }

    public function checksimpledeal($id)
    {
        $msd = MemberSimpleOpportunity::find($id);
        return view('pages.admin.checksimpledeal')->with(['request' => $msd]);
    }

    public function allowsimpledeal(Request $request)
    {
        $msd = MemberSimpleOpportunity::find($request['id']);
        $msd->is_allowed = 1;
        $msd->save();

        $whole_member = User::where('is_allowed', 1)->where('id','!=',$msd->user->id)->get();
        foreach($whole_member as $each_member)
               $this->checkmatchAlgoSimple($msd, $each_member);

        $msg = ['Success','Successfully Allowed To Show Deal Room','success'];
        return redirect()->route('admin.check-simple-deal', ['id' => $msd->id])->with(['msg' => $msg]);
    }

    public function denysimpledeal(Request $request)
    {
        $msd = MemberSimpleOpportunity::find($request['id']);
        $msd->is_allowed = 2;
        $msd->save();
        $msg = ['Success','Successfully Denied To Show Deal Room','success'];
        return redirect()->route('admin.check-simple-deal', ['id' => $msd->id])->with(['msg' => $msg]);
    }

    public function closesimpledeal(Request $request)
    {
        $msd = MemberSimpleOpportunity::find($request['id']);
        $msd->is_active = 0;
        $msd->save();
        $msg = ['Success','Successfully Set Status as Closed','success'];
        return redirect()->route('admin.check-simple-deal', ['id' => $msd->id])->with(['msg' => $msg]);
    }

    public function closenoncoinvestment(Request $request)
    {
        $niq = InvestmentQuestionnaire::find($request['id']);
        $niq->is_active = 0;
        $niq->save();
        $msg = ['Success','Successfully Set Status as Closed','success'];
        return redirect()->route('admin.noncoinvestment-detail',['id' => $niq->id])->with(['msg' => $msg]);
    }

    public function closesumitopportunity(Request $request)
    {
        $requestopportuniy = MemberRequestOpportunity::where('id', $request['id'])->first();
        $requestopportuniy->is_active = 0;
        $requestopportuniy->save();

        $oppor = MemberOpportunityForm::where('code', $requestopportuniy->code)->first();
        if($oppor){
            $oppor->is_active = 0;
            $oppor->save();
        }

        $msg = ['Success','Successfully Set Status as Closed','success'];
        return redirect()->route('admin.requestopportunity-detail',['id'=>$request['id']])->with(['msg' => $msg]);
    }

    public function checksimpledealmatch($id)
    {
        $matchinfo = MemberSimpleOpportunityMatch::where('opportunity_id', $id)->orderBy('score', 'desc')->get();
        $oppor_name = MemberSimpleOpportunity::find($id)->company_name;
        return view('pages.admin.checksimpledealmatchdetail')->with(['matchinfo' => $matchinfo, 'name' => $oppor_name ,'oppor_id' => $id]);
    }

    public function approvesimpledealmatch(Request $request)
    {
        $id = $request['id'];
        $oppor = MemberSimpleOpportunityMatch::find($id);
        $oppor->update(['is_allowed' => 1]);

        $family_email = $oppor->matchedMember->email;
        
        if($oppor->opportunity->company_stage == 1)
            $company_stage = 'Pre-Revenue/Seed';
        elseif($oppor->opportunity->company_stage == 2)
            $company_stage = 'Early Stage/Venture Capital';
        elseif($oppor->opportunity->company_stage == 3)
            $company_stage = 'Private Equity';

        if($oppor->opportunity->prior_year_monthly_finacial) $prior_year_monthly_finacial = $oppor->opportunity->prior_year_monthly_finacial;
        else $prior_year_monthly_finacial = 'No File';

        if($oppor->opportunity->investor_deck) $investor_deck = $oppor->opportunity->investor_deck;
        else $investor_deck = 'No File';

        if($oppor->opportunity->proforma_projections) $proforma_projections = $oppor->opportunity->proforma_projections;
        else $proforma_projections = 'No File';

        if($oppor->opportunity->detailed_cap_table) $detailed_cap_table = $oppor->opportunity->detailed_cap_table;
        else $detailed_cap_table = 'No File';

        $link = route('member.detail-investment-questionnaire',['code' => $oppor->opportunity->code]);
        $subject = 'FIVE Network – Deal Room Opportunity Match';
        $subtitle = 'An Investment Opportunity in the Deal Room might be of Interest to You';
        $content = '<p>An opportunity has been submitted to the Deal Room that matches your Investment Profile. Currently, no members of the FIVE Network have committed to investing in this company, but it is available for review in the Deal Room. Below are the details of the opportunity:</p><br>
        <ul>
        <li>Company Name: '.$oppor->opportunity->company_name.'</li>
        <li>Company Sector: '.$oppor->opportunity->investmentsector->type.'</li>
        <li>Structure: '.$oppor->opportunity->investmentstructure->type.'</li>
        <li>Stage: '.$company_stage.'</li>
        <li>Total Investment Company is looking to Raise: '.$oppor->opportunity->raising.'</li>
        <li>Amount Available for FIVE Network members: $ '.number_format($oppor->opportunity->valuation, 0, '.',',').'</li>
        <label style="font-weight:bold;">Upload Files :</label>
         <li>PRIOR YEAR MONTHLY FINANCIALS : '.$prior_year_monthly_finacial.'</li>
         <li>INVESTOR DECK : '.$investor_deck.'</li>
         <li>3 YEAR PROFORMA PROJECTIONS : '.$proforma_projections.'</li>
         <li>DETAILED CAP TABLE : '.$detailed_cap_table.'</li>
        </ul>';

        $files = [];
        if($oppor->opportunity->prior_year_monthly_finacial) $files[] = public_path('assets/dashboard/profile/file/').$oppor->opportunity->prior_year_monthly_finacial;
        if($oppor->opportunity->investor_deck) $files[] = public_path('assets/dashboard/profile/file/').$oppor->opportunity->investor_deck;
        if($oppor->opportunity->proforma_projections) $files[] = public_path('assets/dashboard/profile/file/').$oppor->opportunity->proforma_projections;
        if($oppor->opportunity->detailed_cap_table) $files[] = public_path('assets/dashboard/profile/file/').$oppor->opportunity->detailed_cap_table;

        Mail::to($family_email)->send(new Highlight($link, $content, $subject, $subtitle, $files));

        $msg = ['Success', 'Successfully Approved to Send Email with hightlight to family','success'];
        return redirect()->route('admin.check-simpledeal-match',['id' => $oppor->opportunity_id])->with(['msg' => $msg]);
    }

    public function allownoncoinvestment(Request $request)
    {
        $niq = InvestmentQuestionnaire::find($request['id']);
        $niq->is_allowed = 1;
        $niq->save();

        $whole_member = User::where('is_allowed', 1)->get();
        foreach($whole_member as $each_member)
               $this->checkmatchAlgo($niq, $each_member);

        $msg = ['Success','Successfully Allowed To Show Deal Room','success'];
        return redirect()->route('admin.noncoinvestment-detail',['id' => $niq->id])->with(['msg' => $msg]);
    }

    public function denynoncoinvestment(Request $request)
    {
        $niq = InvestmentQuestionnaire::find($request['id']);
        $niq->is_allowed = 2;
        $niq->save();
        $msg = ['Success','Successfully Denied To Show Deal Room','success'];
        return redirect()->route('admin.noncoinvestment-detail',['id' => $niq->id])->with(['msg' => $msg]);
    }

    public function dealroomanalyticsview()
    {

        $oppors = InvestmentQuestionnaire::where('is_allowed', 1)->orderBy('created_at','DESC')->get();
        $msds = MemberSimpleOpportunity::where('is_allowed', 1)->orderBy('created_at','DESC')->get();
        $nums = []; $nums1 = [];
        foreach($oppors as $oppor){
            $match = MemberDealMatch::where('opportunity_id', $oppor->id)->get();
            $nums[$oppor->code]['num_met'] = $match->sum('bmet');
            $nums[$oppor->code]['num_evaluate'] = $match->sum('bevaluat');
            $nums[$oppor->code]['num_noevaluate'] = $match->sum('bnoevaluate');
            $nums[$oppor->code]['num_open'] = $match->sum('bopen');
        }

        foreach($msds as $msd){
            $match = MemberSimpleOpportunityMatch::where('opportunity_id', $msd->id)->get();
            $nums1[$msd->code]['num_met'] = $match->sum('bmet');
            $nums1[$msd->code]['num_evaluate'] = $match->sum('bevaluat');
            $nums1[$msd->code]['num_noevaluate'] = $match->sum('bnoevaluate');
            $nums1[$msd->code]['num_open'] = $match->sum('bopen');
        }

        return view('pages.admin.dealroomanalytics')->with(['oppors' => $oppors, 'msds' => $msds, 'nums' => $nums, 'nums1' => $nums1]);
    }

    public function checkdealroommatch($id)
    {
        $matchinfo = MemberDealMatch::where('opportunity_id', $id)->orderBy('score', 'desc')->get();
        $oppor_name = InvestmentQuestionnaire::find($id)->company_name;
        return view('pages.admin.checkdealroommatchdetail')->with(['matchinfo' => $matchinfo, 'name' => $oppor_name, 'oppor_id' => $id]);
    }

    public function approvedealroommatch(Request $request)
    {
        $id = $request['id'];
        $oppor = MemberDealMatch::find($id);
        $oppor->update(['is_allowed' => 1]);

        $family_email = $oppor->matchedMember->email;
        
        if($oppor->opportunity->prior_year_monthly_finacial) $prior_year_monthly_finacial = $oppor->opportunity->prior_year_monthly_finacial;
        else $prior_year_monthly_finacial = 'No File';

        if($oppor->opportunity->investor_deck) $investor_deck = $oppor->opportunity->investor_deck;
        else $investor_deck = 'No File';

        if($oppor->opportunity->proforma_projections) $proforma_projections = $oppor->opportunity->proforma_projections;
        else $proforma_projections = 'No File';

        if($oppor->opportunity->detailed_cap_table) $detailed_cap_table = $oppor->opportunity->detailed_cap_table;
        else $detailed_cap_table = 'No File';


        $link = route('member.detail-investment-questionnaire',['code' => $oppor->opportunity->code]);
        $subject = 'FIVE Network – Deal Room Opportunity Match';
        $subtitle = 'An Investment Opportunity in the Deal Room might be of Interest to You';
        $content = '<p>An opportunity has been submitted to the Deal Room that matches your Investment Profile. Currently, no members of the FIVE Network have committed to investing in this company, but it is available for review in the Deal Room. Below are the details of the opportunity:</p><br>
        <ul>
        <li>Company Name: '.$oppor->opportunity->company_name.'</li>
        <li>Company Description: '.$oppor->opportunity->company_desc.'</li>
        <li>Company Headquaters: '.$oppor->opportunity->investmentregion->type.'</li>
        <li>Company Sector: '.$oppor->opportunity->investmentsector->type.'</li>
        <li>Structure: '.$oppor->opportunity->investmentstructure->type.'</li>
        <li>Stage: '.$oppor->opportunity->investmentstage->type.'</li>
        <li>Total Investment Company is looking to Raise: '.$oppor->opportunity->investment_size.'</li>
        <li>Amount Available for FIVE Network members: $ '.number_format($oppor->investment_size, 0, '.',',').'</li>
        <label style="font-weight:bold;">Upload Files :</label>
         <li>PRIOR YEAR MONTHLY FINANCIALS : '.$prior_year_monthly_finacial.'</li>
         <li>INVESTOR DECK : '.$investor_deck.'</li>
         <li>3 YEAR PROFORMA PROJECTIONS : '.$proforma_projections.'</li>
         <li>DETAILED CAP TABLE : '.$detailed_cap_table.'</li>
        </ul>';

        $files = [];
        if($oppor->opportunity->prior_year_monthly_finacial) $files[] = public_path('assets/dashboard/profile/file/').$oppor->opportunity->prior_year_monthly_finacial;
        if($oppor->opportunity->investor_deck) $files[] = public_path('assets/dashboard/profile/file/').$oppor->opportunity->investor_deck;
        if($oppor->opportunity->proforma_projections) $files[] = public_path('assets/dashboard/profile/file/').$oppor->opportunity->proforma_projections;
        if($oppor->opportunity->detailed_cap_table) $files[] = public_path('assets/dashboard/profile/file/').$oppor->opportunity->detailed_cap_table;

        Mail::to($family_email)->send(new Highlight($link, $content, $subject, $subtitle, $files));

        $msg = ['Success', 'Successfully Approved to Send Email with hightlight to family','success'];
        return redirect()->route('admin.check-dealroom-match',['id' => $oppor->opportunity_id])->with(['msg' => $msg]);
    }

    public function connectmembersdiscuss(Request $request)
    {
        $member_ids = explode(",",$request['connected_member_ids']);
        $type = $request['type'];
        if($type == "simple")
            $company_name = MemberSimpleOpportunity::find($request['oppor_id'])->company_name;
        elseif($type == "deal")
            $company_name = InvestmentQuestionnaire::find($request['oppor_id'])->company_name;
        
        
        foreach($member_ids as $id){
            $to = User::where('id', $id)->first()->email;
            $subtitle = 'FIVE Network Connection about Investment Opportunity';
            $subject = 'FIVE Network Connection about Investment Opportunity';
            $content = 'FIVE Network Members,<br> Based on your feedback, I am connecting you by email to discuss the '.$company_name.' Investment Opportunity. You have expressed interest in the opportunity and/or you are open to discussing the opportunity with FIVE Network members.<br> Best Regards, <br> Aaron';
            $link = '';
            $link_name = 'no';

            Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));
            
        }
        


        $msg = ['Success', 'Successfully connected members to discuss','success'];

        if($type == "simple")
            return redirect()->route('admin.check-simpledeal-match',['id' => $request['oppor_id']])->with(['msg' => $msg]);
        elseif($type == "deal")
            return redirect()->route('admin.check-dealroom-match',['id' => $request['oppor_id']])->with(['msg' => $msg]);
    }

    public function checkmatchAlgo(InvestmentQuestionnaire $mof, User $new_user)
    {
        if($mof){
            $score = 0;

            $state = $mof->state;
            $sector = $mof->sector;
            $stage = $mof->company_stage;
            $structure = $mof->current_capital_raise_structure;
            $size = $mof->investment_size;

            $score_structure = 0;
            $score_stage = 0;
            $score_state = 0;
            $score_sector = 0;
            $score_size = 0;

            if($new_user->investmentstructure){
                foreach($new_user->investmentstructure as $is){
                    if($structure == $is->type_id)
                        $score_structure = 1;
                }
            }

            if($new_user->investmentstage){
                foreach($new_user->investmentstage as $is){
                    if($is->type_id > 2 && $stage == 3) 
                        $score_stage = 1;
                    if($is->type_id <= 2 && $stage == $is->type_id)
                        $score_stage = 1;
                }
            }

            if($new_user->investmentregion){
                foreach($new_user->investmentregion as $is){
                    if($state == $is->type_id)
                        $score_state = 1;
                }
            }

            if($new_user->investmentsector){
                foreach($new_user->investmentsector as $is){
                    if($sector == $is->type_id)
                        $score_sector = 1;
                }
            }


            if($new_user->investmentsize){
                foreach($new_user->investmentsize as $is){
                    if($is->type_id == 1 && $size < 5 * pow(10,5)){
                        $score_size = 1;
                    }elseif($is->type_id == 2 && $size >= 5 * pow(10,5) && $size <= pow(10,6)){
                        $score_size = 1;
                    }elseif($is->type_id == 3 && $size >= pow(10,6) && $size <= 5 * pow(10,6)){
                        $score_size = 1;
                    }elseif($is->type_id == 4 && $size >= 5 * pow(10,6) && $size <= pow(10,7)){
                        $score_size = 1;
                    }elseif($is->type_id == 5 && $size >= pow(10,7)){
                        $score_size = 1;
                    }
                }
            }


            $score = ($score_structure + $score_stage + $score_state + $score_sector + $score_size) * 20;
            $match_member_oppor = MemberDealMatch::where('opportunity_id',$mof->id)->where('matched_member_id',$new_user->id)->first();
            if($match_member_oppor){
                $match_member_oppor->update([
                    'score' => $score,
                    'matched_structure' => $score_structure,
                    'matched_stage' => $score_stage,
                    'matched_state' => $score_state,
                    'matched_sector' => $score_sector,
                    'matched_size' => $score_size
                ]);
            }else{
                $match_member_oppor = MemberDealMatch::create([
                    'opportunity_id' => $mof->id,
                    'matched_member_id' => $new_user->id,
                    'score' => $score,
                    'matched_structure' => $score_structure,
                    'matched_stage' => $score_stage,
                    'matched_state' => $score_state,
                    'matched_sector' => $score_sector,
                    'matched_size' => $score_size
                ]);
            }
        }
    }

    public function checkmatchAlgoSimple(MemberSimpleOpportunity $mof, User $new_user)
    {
        if($mof){
            $score = 0;

            $state = $mof->investment_region;
            $sector = $mof->investment_sector;
            $stage = $mof->company_stage;
            $structure = $mof->current_capital_raise_structure;
            $size = $mof->investment_size;

            $score_structure = 0;
            $score_stage = 0;
            $score_state = 0;
            $score_sector = 0;
            $score_size = 0;

            if($new_user->investmentstructure){
                foreach($new_user->investmentstructure as $is){
                    if($structure == $is->type_id)
                        $score_structure = 1;
                }
            }

            if($new_user->investmentstage){
                foreach($new_user->investmentstage as $is){
                    if($is->type_id > 2 && $stage == 3) 
                        $score_stage = 1;
                    if($is->type_id <= 2 && $stage == $is->type_id)
                        $score_stage = 1;
                }
            }

            if($new_user->investmentregion){
                foreach($new_user->investmentregion as $is){
                    if($state == $is->type_id)
                        $score_state = 1;
                }
            }

            if($new_user->investmentsector){
                foreach($new_user->investmentsector as $is){
                    if($sector == $is->type_id)
                        $score_sector = 1;
                }
            }


            if($new_user->investmentsize){
                foreach($new_user->investmentsize as $is){
                    if($is->type_id == 1 && $size < 5 * pow(10,5)){
                        $score_size = 1;
                    }elseif($is->type_id == 2 && $size >= 5 * pow(10,5) && $size <= pow(10,6)){
                        $score_size = 1;
                    }elseif($is->type_id == 3 && $size >= pow(10,6) && $size <= 5 * pow(10,6)){
                        $score_size = 1;
                    }elseif($is->type_id == 4 && $size >= 5 * pow(10,6) && $size <= pow(10,7)){
                        $score_size = 1;
                    }elseif($is->type_id == 5 && $size >= pow(10,7)){
                        $score_size = 1;
                    }
                }
            }


            $score = ($score_structure + $score_stage + $score_state + $score_sector + $score_size) * 20;
            $match_member_oppor = MemberSimpleOpportunityMatch::where('opportunity_id',$mof->id)->where('matched_member_id',$new_user->id)->first();
            if($match_member_oppor){
                $match_member_oppor->update([
                    'score' => $score,
                    'matched_structure' => $score_structure,
                    'matched_stage' => $score_stage,
                    'matched_state' => $score_state,
                    'matched_sector' => $score_sector,
                    'matched_size' => $score_size
                ]);
            }else{
                $match_member_oppor = MemberSimpleOpportunityMatch::create([
                    'opportunity_id' => $mof->id,
                    'matched_member_id' => $new_user->id,
                    'score' => $score,
                    'matched_structure' => $score_structure,
                    'matched_stage' => $score_stage,
                    'matched_state' => $score_state,
                    'matched_sector' => $score_sector,
                    'matched_size' => $score_size
                ]);
            }
        }
    }
}
