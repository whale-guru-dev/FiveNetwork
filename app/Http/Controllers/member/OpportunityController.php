<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\MemberRequestOpportunity;
use App\Model\MemberOpportunityForm;
use Mail;
use App\Mail\Follow;

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

    }
}
