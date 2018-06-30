<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Preregister;
use App\User;
use Mail;
use App\Mail\Follow;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	return view('pages.admin.dashboard');
    }

    public function checkmembershipview()
    {
        $users = User::where('is_allowed',0)->get();
    	return view('pages.admin.checkmembership')->with(['users'=>$users]);
    }

    public function membershipdetailview($id)
    {
        $user = User::find($id);
        return view('pages.admin.detailmembership')->with(['user'=>$user]);
    }

    public function allowusermembership(Request $request)
    {
        $user = User::find($request['usid']);
        $user->update(['is_allowed'=>1]);
        //Mail Function
        $to = $user->email;
        $subtitle = 'Congratulations and welcome to the FIVE Network!';
        $subject = 'Congratulations and welcome to the FIVE Network.';
        $content = 'Congratulations and welcome to the FIVE Network. We are excited to have you and look forward to bringing you tailored investment opportunities from members of the Family Investment Exchange network. The FIVE Network was created to facilitate investment opportunities between high impact, like-minded families, and we hope that your experience with the Network is one of continued success.
            If at any point during your membership you have questions or concerns, feel free to reach out to  xxxxx@familyinvestmentexchange.com.
            To gain Priority Access to the FIVE Network, invite 5 qualified families to apply for membership by clicking here.';
        $link = route('login');
        $link_name = 'Go To Login';

        Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));

        // return new Follow($link, $content, $subtitle, $subject);
        // return (new App\Mail\InvoicePaid($link, $content, $subtitle, $subject))->render();

        $msg = ['Success','Successfully Allowed User as member.','success'];
        return redirect()->route('admin.membership-detail',['id'=>$user->id])->with(['msg'=>$msg]);
    }

    public function denyusermembership(Request $request)
    {
        $user = User::find($request['usid']);
        $user->update(['is_allowed'=>2]);
        //Mail Function
        $to = $user->email;
        $subtitle = 'Your membership application was denied!';
        $subject = 'Your membership application was denied!';
        $content = 'Unfortunately , your apply membership request has been declined. Please follow this link to request again';
        $link = route('apply-membership',['code'=>$user->user_code]);
        $link_name = 'Go To Apply Membership';

        Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));

        // return new Follow($link, $content, $subtitle, $subject);
        // return (new App\Mail\InvoicePaid($link, $content, $subtitle, $subject))->render();

        $msg = ['Success','Successfully Denied User as member.','success'];
        return redirect()->route('admin.membership-detail',['id'=>$user->id])->with(['msg'=>$msg]);
    }


    public function allowapplymembershipview()
    {
        $users = Preregister::where('allowed',0)->get(); 

        return view('pages.admin.allowapplymembership')->with(['users'=>$users]);
    }

    public function allowapplymembership(Request $request)
    {
        
        $id = $request['id'];
        $user = Preregister::find($id);

        if($user->update(['allowed'=>1])){
            
            //Mail Function
            $to = $user->email;
            $subtitle = 'You are allowed to apply membership!';
            $subject = 'Apply Membership!';
            $content = 'You are allowed by administrator to apply membership, you can apply right now!';
            $link = route('apply-membership',['code'=>$user->code]);
            $link_name = 'Go To Apply Membership';
            Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));

            // return new Follow($link, $content, $subtitle, $subject);
            // return (new App\Mail\InvoicePaid($link, $content, $subtitle, $subject))->render();
            $msg = ['Success','Successfully Allowed User to apply membership.','success'];
            return redirect()->route('admin.allow-apply-membership')->with(['msg'=>$msg]);
        }else{
            $msg = ['Error','There was an error on Allow User to apply membership. Please retry later~','error'];
            return redirect()->route('admin.allow-apply-membership')->with(['msg'=>$msg]);
        }
        
    }

    public function denyapplymembership(Request $request)
    {
        
        $id = $request['id'];
        $user = Preregister::find($id);

        if($user->update(['allowed'=>2])){
            
            //Mail Function
            $to = $user->email;
            $subtitle = 'You are denied to apply membership!';
            $subject = 'Denied Reqeust!';
            $content = 'You are denied by administrator to apply membership, you can\'t apply right now!';
            $link = url('/');
            $link_name = 'Go To Website';
            Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));

            // return new Follow($link, $content, $subtitle, $subject);
            // return (new App\Mail\InvoicePaid($link, $content, $subtitle, $subject))->render();
            $msg = ['Success','Successfully Denied User to apply membership.','success'];
            return redirect()->route('admin.allow-apply-membership')->with(['msg'=>$msg]);
        }else{
            $msg = ['Error','There was an error on Deny User to apply membership. Please retry later~','error'];
            return redirect()->route('admin.allow-apply-membership')->with(['msg'=>$msg]);
        }
        
    }

    

    public function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
 