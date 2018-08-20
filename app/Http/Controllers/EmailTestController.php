<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\Follow;
use App\Mail\Monthly;
use App\Mail\Highlight;
use App\Model\MemberOpportunityMatch;
use App\Model\MemberRequestOpportunity;

class EmailTestController extends Controller
{
    //
    public function emailtest1()
    {
    	$link = url('/');
        $link_name = 'Go To Website';
        $content = 'Thank you for pre-registering to be a part of the Family InVestment Exchange. The membership committee will be in touch with you to request additional information and update you when the platform will be available for use.';
        $subtitle = 'Successfully Requested Access!';
        $subject = 'Successfully Requested Access';
        return new Follow($link, $link_name, $content, $subtitle, $subject);
        // return (new App\Mail\InvoicePaid($link, $content, $subtitle, $subject))->render();
    }
 
    public function highlight()
    {
        $oppor = MemberOpportunityMatch::find(1);
        $oppr_request = MemberRequestOpportunity::find(1);

        $link = route('member.opportunity-detail',['id' => $oppor->opportunity_id]);
        $subject = 'Express your interest';
        $content = '<p>A member of the FIVE Network has submitted an opportunity for co-investment. Below are the details submitted:</p><br>
        <ul>
        <li>Company Name: '.$oppor->opportunity->company_name.'</li>
        <li>Company Description: '.$oppor->opportunity->company_desc.'</li>
        <li>Company Headquaters: '.$oppor->opportunity->investmentregion->type.'</li>
        <li>Company Sector: '.$oppor->opportunity->investmentsector->type.'</li>
        <li>Structure: '.$oppor->opportunity->investmentstructure->type.'</li>
        <li>Stage: '.$oppor->opportunity->investmentstage->type.'</li>
        <li>Total Investment Company is looking to Raise: '.$oppor->opportunity->investment_size.'</li>
        <li>Amount Available for FIVE Network members: '.$oppr_request->valuation.'</li>
        </ul>';

        return new Highlight($link, $content, $subject);
    }

    public function emailtest2()
    {
    	return new Monthly();
    }

    public function monthly()
    {
        return view('pages.landing.monthlyanswer');
    }

    public function viewtest()
    {
        return view('test');
    }

    public function testpost(Request $request)
    {   
        // $i = 1;
        // dd($request->request);exit;
        // if($request->hasFile('prior_year_monthly_finacial'))
        // {
        //     $file = $request->file('prior_year_monthly_finacial');
        //     echo $file->getClientOriginalName();
        //     foreach($file as $each){
        //         echo $each->getClientOriginalName();
        //     }
        // }
        // $test = $request['testfield'];
        // $form = MemberRequestOpportunity::where('code', $test)->first();
        // if(isset($form)){
        //     echo "yes, there is";
        // }else{
        //     echo "no, there isn't";
        // }
        // $money = $request['money'];
        // if($money > "$ ".number_format(1000, 0, '.',',')) {echo "yes";exit;}
        // elseif($money < "$ ".number_format(1000, 0, '.',',')) {echo "no";exit;}
        foreach($request['connected_member_ids'] as $id)
            echo $id;
        // print_r($request['connected_member_ids']);exit;
        // echo number_format($request['mask'], 0, '.',',').' $';
    }
}
