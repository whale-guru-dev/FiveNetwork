<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Model\Faq;
use App\Model\MemberLogin;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $logins = MemberLogin::where('usid', Auth::user()->id)->get();
        $map_markers = MemberLogin::where('is_active', 1)->get();
    	return view('pages.member.dashbaord')->with(['logins' => $logins,'markers' => $map_markers]);
    }

    public function faqview()
    {
    	$faq = Faq::all();
    	return view('pages.member.faq')->with(['faqs'=>$faq]);
    }

    public function profileview()
    {
    	$user = Auth::user();
    	return view('pages.member.profile')->with(['user'=>$user]);
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


}
