<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DealRoomController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function dealroomview()
    {
    	return view('pages.member.dealroom');
    }
}
