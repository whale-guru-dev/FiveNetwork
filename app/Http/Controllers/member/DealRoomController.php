<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\MemberRequestOpportunity;

class DealRoomController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function dealroomview()
    {
    	$oppors = MemberRequestOpportunity::latest()->get();
    	return view('pages.member.dealroom')->with(['oppors' => $oppors]);
    }
}
