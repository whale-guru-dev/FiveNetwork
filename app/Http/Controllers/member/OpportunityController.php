<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\MemberRequestOpportunity;
use App\Model\MemberOpportunityForm;
use App\Model\MemberInvestmentStructure;
use Mail;
use App\Mail\Follow;
use App\User;
use App\Model\MemberOpportunityMatch;

class OpportunityController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function requestview()
    {
    	return view('pages.member.requestopportunity');
    }

    public function request(Request $request)
    {
    	$request_opp = MemberRequestOpportunity::create([
    		'usid' => Auth::user()->id,
    		'email' => $request['email'],
    		'phone' => $request['phone'],
    		'opportunity_name' => $request['opportunity_name'],
    		'investing_amount' => $request['investing_amount'],
    		'raising' => $request['raising'],
    		'valuation' => $request['valuation'],
    		'code' => $this->generateRandomString(10)
    	]);

    	if($request_opp){
    		$msg = ['Success','Successfully Requested','success'];
    		return redirect()->route('member.request-opportunity')->with(['msg' => $msg]);
    	}
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

    public function submitopportunityformview($code)
    {
        $opportunitymember = MemberRequestOpportunity::where('code',$code)->where('is_submitted',0)->first();
        if($opportunitymember){
            return view('pages.member.submitopportunityform')->with(['opportunitymember' => $opportunitymember]);
        }else{
            return redirect()->route('member.dashboard');
        }
    }

    public function submitopportunityform(Request $request)
    {
        $form = MemberOpportunityForm::create([
            'member_id' => Auth::user()->id,
            'code' => $request['code'],
            'bremain_anonymous' => $request['bremain_anonymous'],
            'name_remain_anonymous' => $request['name_remain_anonymous'],
            'reachout_method' => $request['reachout_method'],
            'contact_email' => $request['contact_email'],
            'project_name' => $request['project_name'],
            'company_desc' => $request['company_desc'],
            'headquater_loc' => $request['headquater_loc'],
            'operation_loc' => $request['operation_loc'],
            'sector_subsector_specialization' => $request['sector_subsector_specialization'],
            'investment_structuretype_id' => $request['investment_structuretype_id'],
            'independent_sponsor' => $request['independent_sponsor'],
            'offered_stake' => $request['offered_stake'],
            'amount_seeking_investment' => $request['amount_seeking_investment'],
            'revenue' => $request['revenue'],
            'EBITDA' => $request['EBITDA'],
            'valuation' => $request['valuation'],
            'structure_term' => $request['structure_term'],
            'additional_commentary' => $request['additional_commentary']
        ]);

        $to = $form->user->email;
        $subtitle = 'Successfully Submitted Your Co-Investment Opportunity!';
        $subject = 'Submitted Your Co-Investment Opportunity!';
        $content = 'Thank you for submitting your co-investment opportunity to the Family InVestment Exchange. Once the opportunity has matched the profile of a member of the FIVE Network, we will connect them to the appropriate contact person for this opportunity.';
        $link = url('/member');
        $link_name = 'Go To Dashboard';

        Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));


        $msg = ['Success','Successfully Submitted Your Co-Investment Opportunity','success'];
        return redirect()->route('member.submit-opportunity-form',['code' => $form->code])->with(['msg' => $msg]);
    }

    public function calculateScore(MemberOpportunityForm $mof)
    {
        $score = 0;
        $member = User::where('id', $mof->member_id)->first();
        $investment_structuretype_id = $mof->investment_structuretype_id;
        $offered_stake = $mof->offered_stake; //0->less than 50%, 1->more than 50%, 2->100%
        $amount_seeking_investment = $mof->amount_seeking_investment;

        $whole_member = User::whereNot('id', $member->id)->get();
        foreach($whole_member as $each)
        {
            if($each->investmentstructure){
                if(in_array($investment_structuretype_id, $each->investmentstructure))
                $score = $score + 30;
            }

            if($each->additional_capacity){
                if($each->additional_capacity == 100 && $offered_stake == 2){
                    $score = $score + 30;
                }elseif($each->additional_capacity > 50 && $offered_stake == 1){
                    $score = $score + 30;
                }elseif($each->additional_capacity < 50 && $offered_stake == 0){
                    $score = $score + 30;   
                }
            }

            if($each->investmentsize){
                foreach($each->investmentsize as $is){
                    if($is == 1 && $amount_seeking_investment < 5 * pow(10,5)){
                        $score = $score + 30;
                    }elseif($is == 2 && $amount_seeking_investment >= 5 * pow(10,5) && $amount_seeking_investment =< pow(10,6)){
                        $score = $score + 30;
                    }elseif($is == 3 && $amount_seeking_investment >= pow(10,6) && $amount_seeking_investment <= 5 * pow(10,6)){
                        $score = $score + 30;
                    }elseif($is == 4 && $amount_seeking_investment >= 5 * pow(10,6) && $amount_seeking_investment <= pow(10,7)){
                        $score = $score + 30;
                    }elseif($is == 5 && $amount_seeking_investment >= pow(10,7)){
                        $score = $score + 30;
                    }
                }
            }

            if($score > 50){
                $to = $each->email;
                $subtitle = 'Successfully Submitted Your Co-Investment Opportunity!';
                $subject = 'Matched Opportunity';
                $content = 'Member.<br> A member of the FIVE Network has submitted a co-investment opportunity that could be of interest to you based on your profile. If this opportunity does not fit within the types of opportunities you are seeking, click here to update your profile.';
                $link = url('/member');
                $link_name = 'Go To Dashboard';

                Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));

                MemberOpportunityMatch::create([
                    'opportunity_id' => $mof->id,
                    'member_id' => $each->id,
                    'score' => $score
                ]);
            }
        }


    }
}
