<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\Follow;
use App\Mail\Monthly;

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

        echo number_format($request['mask'], 0, '.',',').' $';
    }
}
