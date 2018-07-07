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

class OpportunityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function checkrequest()
    {
    	$requests = MemberRequestOpportunity::where('is_accepted',0)->get();
    	return view('pages.admin.requestopportuniy')->with(['requests' => $requests]);
    }

    public function detailrequestopportunity($id)
    {
    	$request = MemberRequestOpportunity::where('id',$id)->first();
    	return view('pages.admin.detailrequestopportunity')->with(['request' => $request]);
    }

    public function checkallrequest()
    {
    	$requests = MemberRequestOpportunity::all();
    	return view('pages.admin.checkallrequest')->with(['requests' => $requests]);
    }

    public function allowusersumitopportunity(Request $request)
    {
    	$requestopportuniy = MemberRequestOpportunity::where('id', $request['id'])->first();
    	$requestopportuniy->is_accepted = 1;
    	$requestopportuniy->save();

    	$to = $requestopportuniy->email;
        $subtitle = 'Your opportunity was accepted!';
        $subject = 'Your opportunity was accepted!';
        $content = 'A member of the Family Investment Exchange has requested we contact you to request additional information on your investment opportunity. Please complete the Investment Questionnaire in this email to share this opportunity with families throughout the US who are looking for opportunities like yours.<br>Best,<br>The Five Network Team.';
        $link = route('member.investment-questionnaire-form',['code' => $requestopportuniy->code]);
        $link_name = 'Fill out the forms';

        Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));

    	$msg = ['Success','Successfully Allowed Member to Submit Opportunity','success'];

    	return redirect()->route('admin.requestopportunity-detail',['id'=>$request['id']])->with(['msg' => $msg]);
    }

    public function denyusersumitopportunity(Request $request)
    {
    	$requestopportuniy = MemberRequestOpportunity::where('id', $request['id'])->first();
    	$requestopportuniy->is_accepted = 2;
    	$requestopportuniy->save();

    	$to = $requestopportuniy->user->email;
        $subtitle = 'Your opportunity was denied!';
        $subject = 'Your opportunity was denied!';
        $content = 'Unfortunately your opportunity was denied.';
        $link = route('member.submit-opportunity');
        $link_name = 'Request Another Opportunity';

        Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));

    	$msg = ['Success','Successfully Denied Member to Submit Opportunity','success'];
    	return redirect()->route('admin.requestopportunity-detail',['id'=>$request['id']])->with(['msg' => $msg]);
    }

    public function analyticsview()
    {
        $oppors = MemberOpportunityForm::all();
        return view('pages.admin.opportunityanalytics')->with(['oppors' => $oppors]);
    }

    public function detailopportunity($id)
    {
        $oppor = MemberOpportunityForm::find($id);
        return view('pages.admin.detailopportunity')->with(['oppor' => $oppor]);
    }

    public function checkmatch($id)
    {
        $matchinfo = MemberOpportunityMatch::where('opportunity_id', $id)->orderBy('score', 'desc')->get();
        return view('pages.admin.checkmatchdetail')->with(['matchinfo' => $matchinfo]);
    }

    public function approveopportunitymatch(Request $request)
    {
        $id = $requests['id'];
        $oppor = MemberOpportunityMatch::find($id);
        $oppor->update(['is_allowed' => 1]);

        $family_email = $oppor->matchedMember->email;

        //Mail

        $msg = ['Success', 'Successfully Approved to Send Email with hightlight to family','success'];
        return redirect()->route('admin.check-member-opportunity-match',['id' => $oppor->opportunity_id])->with(['msg' => $msg]);
    }
}
