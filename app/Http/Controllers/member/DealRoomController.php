<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\MemberRequestOpportunity;
use App\Model\MemberOpportunityForm;

class DealRoomController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function dealroomview()
    {
    	// $oppors = MemberRequestOpportunity::latest()->get();
    	$oppors = MemberOpportunityForm::latest()->get();
    	return view('pages.member.dealroom')->with(['oppors' => $oppors]);
    }
}
