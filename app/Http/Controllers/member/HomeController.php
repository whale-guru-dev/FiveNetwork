<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Model\Faq;
use App\Model\MemberLogin;
use App\Model\MemberReferLog;
use App\Model\MemberFeedback;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $logins = MemberLogin::where('usid', Auth::user()->id)->orderBy('created_at','DESC')->get();
        $members = User::where('is_allowed', 1)->get();
        $map_markers = [];
        $map_regions = [];

        foreach($members as $member){
            // $login = MemberLogin::where('usid', $member->id)->where('is_usa', 1)->first();

            // if($login){
                // $map_markers[$member->id]['lat'] = $login->lat;
                // $map_markers[$member->id]['long'] = $login->long;
                // $map_markers[$member->id]['fName'] = $login->member->fName;
                // $map_markers[$member->id]['lName'] = $login->member->lName;
                $map_regions[] = $member->state;
            // }
            
        }

    	return view('pages.member.dashbaord')->with(['logins' => $logins,'markers' => $map_markers, 'regions' => $map_regions]);
    }

    public function faqview()
    {
    	$faq = Faq::all();
    	return view('pages.member.faq')->with(['faqs'=>$faq]);
    }

    public function profileview()
    {
    	$user = Auth::user();
        $logins = MemberLogin::where('usid', Auth::user()->id)->orderBy('created_at','DESC')->get();
    	return view('pages.member.profile')->with(['user'=>$user, 'logins' => $logins]);
    }

    public function viewreferral()
    {
        $referlog = MemberReferLog::where('usid', Auth::user()->id)->get();
        return view('pages.member.referrals')->with(['referlog' => $referlog]);
    }

    public function viewlogins()
    {
        $logins = MemberLogin::where('usid', Auth::user()->id)->orderBy('created_at','DESC')->get();
        return view('pages.member.logins')->with(['logins' => $logins]);
    }

    // public function lockscreen()
    // {
    //     $user = Auth::user();
    //     $email = $user->email;
    // }

    // public function keepalive()
    // { 
    //     $user = Auth::user();
    // }

    public function feedback(Request $request)
    {
        $usid = Auth::user()->id;
        $text = $request->feedback;

        $feedback = MemberFeedback::create([
            'usid' => $usid,
            'feedback' => $text
        ]);

        if($feedback)
            return response()->json(['status' => 'ok']);
        else 
            return response()->json(['status' => 'no']);
    }

}
