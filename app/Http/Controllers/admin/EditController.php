<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Faq;
use App\Model\MemberFeedback;

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

    public function faqupdate(Request $request)
    {
        $faq = Faq::find($request['id']);
        $faq->question = $request['question'];
        $faq->answer = $request['answer'];
        $faq->save();
        $msg = ['Success','Successfully Editted A Faq','success'];
        return redirect()->route('admin.edit-faq-view')->with(['msg'=>$msg]);
    }

    public function removefaq(Request $request)
    {
        $faq = Faq::find($request['id']);
        $faq->delete();
        $msg = ['Success','Successfully Removed A Faq','success'];
        return redirect()->route('admin.edit-faq-view')->with(['msg'=>$msg]);
    }

    public function getfaq(Request $request)
    {
        $faq = Faq::find($request['id']);
        return response()->json(['status' => 'ok', 'quiz' => $faq->question, 'answer' => $faq->answer]);
    }

    public function checkfeedback()
    {
        $feedbacks = MemberFeedback::latest()->get();
        return view('pages.admin.feedback')->with(['feedbacks' => $feedbacks]);
    }

    public function removefeedback(Request $request)
    {
        $id = $request['feedback_id'];
        MemberFeedback::find($id)->delete();
        $msg = ['Success', 'Successfully Removed A Feedback','success'];
        return redirect()->route('admin.check-feedback')->with(['msg' => $msg]);
    }
}
