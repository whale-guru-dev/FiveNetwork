<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\MemberRequestOpportunity;
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

    public function allowusersumitopportunity(Request $request)
    {
    	$requestopportuniy = MemberRequestOpportunity::where('id', $request['id'])->first();
    	$requestopportuniy->is_accepted = 1;
    	$requestopportuniy->save();

    	$to = $requestopportuniy->user->email;
        $subtitle = 'Your opportunity was accepted!';
        $subject = 'Your opportunity was accepted!';
        $content = 'The family investment exchange is more interested in your opportunity so please follow this link to fill out the forms.';
        $link = route('member.submit-opportunity-form',['code' => $requestopportuniy->code]);
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
        $link = route('member.request-opportunity');
        $link_name = 'Request Another Opportunity';

        Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));

    	$msg = ['Success','Successfully Denied Member to Submit Opportunity','success'];
    	return redirect()->route('admin.requestopportunity-detail',['id'=>$request['id']])->with(['msg' => $msg]);
    }
}
