<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\MemberMonthlyEmail;

class MonthlyEmailController extends Controller
{
   public function gatherview($year, $month,$memberid, $code)
   {
	   	// $mme = MemberMonthlyEmail::where('usid',$memberid)->where('code', $code)->where('is_answered', 0)->first();
	   	// if($mme){
	   	return view('pages.landing.monthlyanswer')->with(['year' => $year, 'month' => $month, 'memberid' => $memberid, 'code' => $code]);
	   	// }else
   		// 	return redirect()->route('home');
   	
   }

   public function gatherinfo(Request $request)
   {
	   	$memberid = $request['memberid'];
	   	$code = $request['code'];
	   	$year = $request['year'];
	   	$month = $request['month'];

	   	$mme = MemberMonthlyEmail::where('usid',$memberid)->where('code', $code)->where('is_answered', 0)->first();

	   	if($mme){
	   		$result = $mme->update([
			   			'bsubmitted' => $request['bsubmitted'],
			   			'bfindinvestor' => $request['bfindinvestor'],
			   			'investor' => $request['investor'],
			   			'capital' => $request['capital'],
			   			'largetransaction' => $request['largetransaction'],
			   			'binvested' => $request['binvested'],
			   			'investor1' => $request['investor1'],
			   			'capital1'  => $request['capital1'],
			   			'largetransacton1' => $request['largetransacton1'],
			   			'nopportunity' => $request['nopportunity'],
			   			'feedback' => $request['feedback'],
			   			'is_answered' => 1,
			   			'year' => $year,
			   			'month' => $month
			   		]);

	   		if($result == 1){
	   			$msg = ['Success','Thank you for your answers!','success'];
	   			return redirect()->route('monthly-email',['year' => $year, 'month' => $month, 'memberid' => $memberid, 'code' => $code])->with(['msg' => $msg]);
	   		}else{
	   			$msg = ['Error','There was an error, Please try again!','error'];
	   			return redirect()->route('monthly-email',['year' => $year, 'month' => $month, 'memberid' => $memberid, 'code' => $code])->with(['msg' => $msg]);
	   		}
	   	}else{
	   		$msg = ['Warning','You can\'t answer these questions.','error'];
	   			return redirect()->route('monthly-email',['year' => $year, 'month' => $month, 'memberid' => $memberid, 'code' => $code])->with(['msg' => $msg]);
	   	}
   }
}
