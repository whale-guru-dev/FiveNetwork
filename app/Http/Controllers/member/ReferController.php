<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Model\Preregister;
use App\Model\MemberReferLog;
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
        $refers = User::where('refer_by',Auth::user()->user_code)->latest()->get();
        $preregisters = Preregister::where('refer_by',Auth::user()->user_code)->where('applied',0)->latest()->get();
        return view('pages.member.refermember')->with(['referers'=>$refers,'preregisters'=>$preregisters]);
    }

    public function refermember(Request $request)
    {
    	$email = $request['family_email'];
    	$link = url('/follow-me/'.Auth::user()->user_code);
        $link_name = 'Family Investment Exchange';
        $content = 'You have been invited to become a member of the Family Investment Exchange (FIVE Network). Click below to request access to the exclusive network of family office and private investors and start accessing co-investment opportunities alongside high impact investors.';
        $subtitle = 'You have been invited to join the Family Investment Exchange';
        $subject = 'Invitation To Join Family Investment Exchange';

        Mail::to($email)->send(new Follow($link, $link_name, $content, $subtitle, $subject));

        $link = route('member.dashboard');
        $link_name = 'Family Investment Exchange';
        $content = 'Thank you for referring '.$email.' to join the Family Investment Exchange.';
        $subtitle = 'Thank you for referring';
        $subject = 'Thank you for referring';

        Mail::to(Auth::user()->email)->send(new Follow($link, $link_name, $content, $subtitle, $subject));

        $log = MemberReferLog::create(['usid' => Auth::user()->id,'referer_email' => $email]);

        // return new Follow($link, $content, $subtitle, $subject);
        // return (new App\Mail\InvoicePaid($link, $content, $subtitle, $subject))->render();

    	$msg = ['Success','Successfully Sent Request','success'];

    	return redirect()->route('member.refer-member-view')->with(['msg'=>$msg]);
    }

}
