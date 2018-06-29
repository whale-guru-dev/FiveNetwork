<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Model\Preregister;
use Mail;
use App\Mail\Follow;

class ReferController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function refermemberview()
    {
        $refers = User::where('refer_by',Auth::user()->user_code)->get();
        $preregisters = Preregister::where('refer_by',Auth::user()->user_code)->where('applied',0)->get();
        return view('pages.member.refermember')->with(['referers'=>$refers,'preregisters'=>$preregisters]);
    }

    public function refermember(Request $request)
    {
    	$email = $request['family_email'];
    	$link = url('/follow-me/'.Auth::user()->user_code);
        $link_name = 'Follow Me';
        $content = 'Dear Enprepreneur~ Please follw my link. You can get a wonderful result.';
        $subtitle = 'Follow My Link';
        $subject = 'Follow Me';

        Mail::to($email)->send(new Follow($link, $link_name, $content, $subtitle, $subject));

        // return new Follow($link, $content, $subtitle, $subject);
        // return (new App\Mail\InvoicePaid($link, $content, $subtitle, $subject))->render();

    	$msg = ['Success','Successfully Sent Request','success'];

    	return redirect()->route('member.refer-member-view')->with(['msg'=>$msg]);
    }

}
