<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Preregister;
use App\User;
use Mail;
use App\Mail\Follow;
use App\Model\MemberOpportunityForm;
use App\Model\MemberOpportunityMatch;
use App\Model\MemberLogin;
use App\Model\MemberRequestOpportunity;
use App\Model\MemberReferLog;
use App\Model\InvestmentQuestionnaire;
use App\Model\MemberDealMatch;
use App\Model\MemberSimpleOpportunity;
use App\Model\MemberSimpleOpportunityMatch;

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

    public function dashboardview()
    {
        return view('pages.admin.dashboard');
    }

    public function checkmembershipview()
    {
        $users = User::where('is_allowed',0)->orderBy('created_at','DESC')->get();
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
        $subtitle = 'Congratulations and Welcome to the Family Investment Exchange!';
        $subject = 'Congratulations and Welcome to the Family Investment Exchange';
        $content = 'Congratulations and welcome to the FIVE Network. We are excited to have you and look forward to bringing you tailored investment opportunities from members of the Family Investment Exchange network. The FIVE Network was created to facilitate investment opportunities between high impact, like-minded families, and we hope that your experience with the Network is one of continued success.';
        $link = route('login');
        $link_name = 'Go To Login';

        Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));

        $mofs = MemberRequestOpportunity::where('is_accepted', 1)->where('is_submitted', 1)->get();
        foreach($mofs as $mof)
            $this->checkmatch($mof,$user);

        $niqs = InvestmentQuestionnaire::where('is_allowed', 1)->get();
        foreach($niqs as $niq)
            $this->checkmatchAlgo($niq, $user);

        $msds = MemberSimpleOpportunity::where('is_allowed', 1)->get();
        foreach($msds as $msd)
            $this->checkmatchAlgoSimple($msd, $user);
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
        $subtitle = 'Your membership application was denied';
        $subject = 'Your membership application was denied';
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
            $subtitle = 'Access granted to the Family Investment Exchange';
            $subject = 'Access granted to the Family Investment Exchange';
            $content = 'You have been granted access to apply for membership to Family Investment Exchange';
            $link = route('apply-membership',['code'=>$user->code]);
            $link_name = 'Begin Application';
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
            $subtitle = 'You are denied to apply membership';
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

    public function checkallmembership()
    {
        $members = User::all();
        return view('pages.admin.checkallmembership')->with(['members' => $members]);
    }

    public function removememberview()
    {
        $members = User::where('is_allowed', '!=', 3)->get();
        return view('pages.admin.removememberview')->with(['members' => $members]);
    }

    public function removemember(Request $request)
    {
        $id = $request['id'];
        $user = User::find($id);
        $user->is_allowed = 3;
        $user->save();
        $msg = ['Success','Successfully Removed User.','success'];
        return redirect()->route('admin.remove.member')->with(['msg'=>$msg]);
    }

    public function removedmember()
    {
        $members = User::where('is_allowed', 3)->get();
        return view('pages.admin.removedmemberview')->with(['users' => $members]);
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

    public function checkmatch(MemberRequestOpportunity $mof, User $new_user)
    {
        if($mof){
            $score = 0;

            $state = $mof->investment_region;
            $sector = $mof->investment_sector;
            $stage = $mof->company_stage;
            $structure = $mof->investment_structure;
            $size = $mof->valuation;

            $score_structure = 0;
            $score_stage = 0;
            $score_state = 0;
            $score_sector = 0;
            $score_size = 0;

            if($new_user->investmentstructure){
                foreach($new_user->investmentstructure as $is){
                    if($structure == $is->type_id)
                        $score_structure = 1;
                }
            }

            if($new_user->investmentstage){
                foreach($new_user->investmentstage as $is){
                    if($is->type_id > 2 && $stage == 3) 
                        $score_stage = 1;
                    if($is->type_id <= 2 && $stage == $is->type_id)
                        $score_stage = 1;
                }
            }

            if($new_user->investmentregion){
                foreach($new_user->investmentregion as $is){
                    if($state == $is->type_id)
                        $score_state = 1;
                }
            }

            if($new_user->investmentsector){
                foreach($new_user->investmentsector as $is){
                    if($sector == $is->type_id)
                        $score_sector = 1;
                }
            }


            if($new_user->investmentsize){
                foreach($new_user->investmentsize as $is){
                    if($is->type_id == 1 && $size < 5 * pow(10,5)){
                        $score_size = 1;
                    }elseif($is->type_id == 2 && $size >= 5 * pow(10,5) && $size <= pow(10,6)){
                        $score_size = 1;
                    }elseif($is->type_id == 3 && $size >= pow(10,6) && $size <= 5 * pow(10,6)){
                        $score_size = 1;
                    }elseif($is->type_id == 4 && $size >= 5 * pow(10,6) && $size <= pow(10,7)){
                        $score_size = 1;
                    }elseif($is->type_id == 5 && $size >= pow(10,7)){
                        $score_size = 1;
                    }
                }
            }

            $oppor_id = MemberOpportunityForm::where('code', $mof->code)->first()->id;

            $score = ($score_structure + $score_stage + $score_state + $score_sector + $score_size) * 20;
            $match_member_oppor = MemberOpportunityMatch::create([
                'opportunity_id' => $oppor_id,
                'matched_member_id' => $new_user->id,
                'score' => $score,
                'matched_structure' => $score_structure,
                'matched_stage' => $score_stage,
                'matched_state' => $score_state,
                'matched_sector' => $score_sector,
                'matched_size' => $score_size
            ]);

        }
        
    }

    public function checkmatchAlgo(InvestmentQuestionnaire $mof, User $new_user)
    {
        if($mof){
            $score = 0;

            $state = $mof->state;
            $sector = $mof->sector;
            $stage = $mof->company_stage;
            $structure = $mof->current_capital_raise_structure;
            $size = $mof->investment_size;

            $score_structure = 0;
            $score_stage = 0;
            $score_state = 0;
            $score_sector = 0;
            $score_size = 0;

            if($new_user->investmentstructure){
                foreach($new_user->investmentstructure as $is){
                    if($structure == $is->type_id)
                        $score_structure = 1;
                }
            }

            if($new_user->investmentstage){
                foreach($new_user->investmentstage as $is){
                    if($is->type_id > 2 && $stage == 3) 
                        $score_stage = 1;
                    if($is->type_id <= 2 && $stage == $is->type_id)
                        $score_stage = 1;
                }
            }

            if($new_user->investmentregion){
                foreach($new_user->investmentregion as $is){
                    if($state == $is->type_id)
                        $score_state = 1;
                }
            }

            if($new_user->investmentsector){
                foreach($new_user->investmentsector as $is){
                    if($sector == $is->type_id)
                        $score_sector = 1;
                }
            }


            if($new_user->investmentsize){
                foreach($new_user->investmentsize as $is){
                    if($is->type_id == 1 && $size < 5 * pow(10,5)){
                        $score_size = 1;
                    }elseif($is->type_id == 2 && $size >= 5 * pow(10,5) && $size <= pow(10,6)){
                        $score_size = 1;
                    }elseif($is->type_id == 3 && $size >= pow(10,6) && $size <= 5 * pow(10,6)){
                        $score_size = 1;
                    }elseif($is->type_id == 4 && $size >= 5 * pow(10,6) && $size <= pow(10,7)){
                        $score_size = 1;
                    }elseif($is->type_id == 5 && $size >= pow(10,7)){
                        $score_size = 1;
                    }
                }
            }


            $score = ($score_structure + $score_stage + $score_state + $score_sector + $score_size) * 20;
            $match_member_oppor = MemberDealMatch::where('opportunity_id',$mof->id)->where('matched_member_id',$new_user->id)->first();
            if($match_member_oppor){
                $match_member_oppor->update([
                    'score' => $score,
                    'matched_structure' => $score_structure,
                    'matched_stage' => $score_stage,
                    'matched_state' => $score_state,
                    'matched_sector' => $score_sector,
                    'matched_size' => $score_size
                ]);
            }else{
                $match_member_oppor = MemberDealMatch::create([
                    'opportunity_id' => $mof->id,
                    'matched_member_id' => $new_user->id,
                    'score' => $score,
                    'matched_structure' => $score_structure,
                    'matched_stage' => $score_stage,
                    'matched_state' => $score_state,
                    'matched_sector' => $score_sector,
                    'matched_size' => $score_size
                ]);
            }
        }
    }

    public function checkmatchAlgoSimple(MemberSimpleOpportunity $mof, User $new_user)
    {
        if($mof){
            $score = 0;

            $state = $mof->investment_region;
            $sector = $mof->investment_sector;
            $stage = $mof->company_stage;
            $structure = $mof->current_capital_raise_structure;
            $size = $mof->investment_size;

            $score_structure = 0;
            $score_stage = 0;
            $score_state = 0;
            $score_sector = 0;
            $score_size = 0;

            if($new_user->investmentstructure){
                foreach($new_user->investmentstructure as $is){
                    if($structure == $is->type_id)
                        $score_structure = 1;
                }
            }

            if($new_user->investmentstage){
                foreach($new_user->investmentstage as $is){
                    if($is->type_id > 2 && $stage == 3) 
                        $score_stage = 1;
                    if($is->type_id <= 2 && $stage == $is->type_id)
                        $score_stage = 1;
                }
            }

            if($new_user->investmentregion){
                foreach($new_user->investmentregion as $is){
                    if($state == $is->type_id)
                        $score_state = 1;
                }
            }

            if($new_user->investmentsector){
                foreach($new_user->investmentsector as $is){
                    if($sector == $is->type_id)
                        $score_sector = 1;
                }
            }


            if($new_user->investmentsize){
                foreach($new_user->investmentsize as $is){
                    if($is->type_id == 1 && $size < 5 * pow(10,5)){
                        $score_size = 1;
                    }elseif($is->type_id == 2 && $size >= 5 * pow(10,5) && $size <= pow(10,6)){
                        $score_size = 1;
                    }elseif($is->type_id == 3 && $size >= pow(10,6) && $size <= 5 * pow(10,6)){
                        $score_size = 1;
                    }elseif($is->type_id == 4 && $size >= 5 * pow(10,6) && $size <= pow(10,7)){
                        $score_size = 1;
                    }elseif($is->type_id == 5 && $size >= pow(10,7)){
                        $score_size = 1;
                    }
                }
            }


            $score = ($score_structure + $score_stage + $score_state + $score_sector + $score_size) * 20;
            $match_member_oppor = MemberSimpleOpportunityMatch::where('opportunity_id',$mof->id)->where('matched_member_id',$new_user->id)->first();
            if($match_member_oppor){
                $match_member_oppor->update([
                    'score' => $score,
                    'matched_structure' => $score_structure,
                    'matched_stage' => $score_stage,
                    'matched_state' => $score_state,
                    'matched_sector' => $score_sector,
                    'matched_size' => $score_size
                ]);
            }else{
                $match_member_oppor = MemberSimpleOpportunityMatch::create([
                    'opportunity_id' => $mof->id,
                    'matched_member_id' => $new_user->id,
                    'score' => $score,
                    'matched_structure' => $score_structure,
                    'matched_stage' => $score_stage,
                    'matched_state' => $score_state,
                    'matched_sector' => $score_sector,
                    'matched_size' => $score_size
                ]);
            }
        }
    }

    public function visitdetail($date)
    {
        if($date == 'total'){
            $logins = MemberLogin::orderBy('created_at','DESC')->get();
            $date = 'Total';
        }elseif($date == 'today'){
            $logins = MemberLogin::whereDate('created_at', '=', \Carbon\Carbon::today()->toDateString())->orderBy('created_at','DESC')->get();
            $date = 'Today';
        }elseif($date == 'current'){
            $logins = MemberLogin::whereDate('created_at', '=', \Carbon\Carbon::today()->toDateString())->where('is_active', 1)->orderBy('created_at','DESC')->get();
            $date = 'Current';
        }else{
            return redirect()->route('admin.member-visit-detail',['date' => 'total']);
        }

        return view('pages.admin.detaillogins')->with(['logins' => $logins, 'date' => $date]);
    }

    public function memberactivity($id)
    {
        $member = User::find($id);
        $logins = MemberLogin::where('usid', $id)->orderBy('created_at', 'DESC')->get();
        $oppors = MemberRequestOpportunity::where('usid', $id)->orderBy('created_at', 'DESC')->get();
        $referlog = MemberReferLog::where('usid', $id)->orderBy('created_at', 'DESC')->get();
        $matchs = MemberOpportunityMatch::where('matched_member_id', $id)->get();
        $deals = MemberSimpleOpportunity::where('usid', $id)->orderBy('created_at', 'DESC')->get();

        return view('pages.admin.memberactivity')->with(['member' => $member, 'logins' => $logins, 'oppors' => $oppors, 'referlog' => $referlog, 'matchs' => $matchs, 'deals' => $deals]);
    }
}
 