<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Faq;

class EditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function faqview()
    {
    	$faqs = Faq::all();
    	return view('pages.admin.faq')->with(['faqs'=>$faqs]);
    }

    public function faqedit(Request $request)
    {
    	$faq = Faq::create(['question'=>$request['question'],'answer'=>$request['answer']]);
    	$msg = ['Success','Successfully Created New Faq','success'];
    	return redirect()->route('admin.edit-faq-view')->with(['msg'=>$msg]);
    }
}
