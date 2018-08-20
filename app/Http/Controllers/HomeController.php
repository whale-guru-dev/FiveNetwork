<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Preregister;
use App\User;
use App\Model\MemberInvestmentStructure;
use App\Model\MemberInvestmentSize;
use App\Model\MemberInvestmentStage;
use App\Model\MemberInvestmentRegion;
use App\Model\MemberInvestmentSector;
use Mail;
use App\Mail\Follow;
use App\Model\Admin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.landing.landing');
    }

    public function preregister(Request $request)
    {
        $request->validate(['email'=>'required|unique:tb_member_preregister']);
        $user = Preregister::create(['email'=>$request['email'], 'code'=>$this->generateRandomString()]);
        // return redirect()->route('refer-member',['user' => $user['email']]);
        return redirect()->route('home');
    }

    public function requestaccessview()
    {
        return view('pages.landing.requestaccess');
    }

    public function requestaccess(Request $request)
    {
        if(empty(session('refer_by'))){
            $referat_de ='0';
        }else{
            $referat_de = session('refer_by');
        }

        $request->validate(['email'=>'required|unique:tb_member_preregister']);
        $user = Preregister::create(['email'=>$request['email'], 'code'=>$this->generateRandomString(10),'refer_by'=>$referat_de]);
        if($user){
            $email = $user['email'];
            $link = route('home');
            $link_name = 'no';
            $content = 'Thank you for requesting access to the Family Investment Exchange. A member of the FIVE Network will reach out to request additional information in the coming days.';
            $subtitle = 'Access Requested!';
            $subject = 'Access Requested';
            
            Mail::to($email)->send(new Follow($link, $link_name, $content, $subtitle, $subject));

            foreach(Admin::all() as $admin)
            {
                $to = $admin->email;
                $subtitle = 'Requested Access!';
                $subject = 'Requested Access!';
                $content = 'Someone with email '.$email.' requested access, Please check the request';
                $link = url('/admin');
                $link_name = 'Go To Dashboard';
    
                Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));
            }

            $msg = ['Success','Thank you for requesting access to the Family Investment Exchange. One of our members will be contacting you soon.','success'];
            return redirect()->route('request-access')->with(['user' => $user['email'], 'msg'=>$msg]);
        }
    }

    public function Referral($link)
    {
        session(['refer_by'=>$link]);

        return redirect()->route('request-access'); 
    }


    public function refermemberview($user = null)
    {

        $referer = Preregister::where('email', $user)->first();
        if($referer){
            return view('pages.landing.refermember')->with(['user' => $referer]);
        }else{
            return redirect('/');
        }

        
    }

    public function refermember(Request $request)
    {

        $emails = $request['email'];
        $ref_by = $request['refer_by'];
        $referer = Preregister::where('email', $ref_by)->first();

        $link = '';
        $link_name = '';
        $content = 'Thank you for referring families to join the Family Investment Exchange.';
        $subtitle = 'Thank you for referring!';
        $subject = 'Thank you for referring';

        Mail::to($ref_by)->send(new Follow($link, $link_name, $content, $subtitle, $subject));


        $refer_link = url('/follow-me/'.$referer->code);
        foreach ($emails as $email) {
            if($email != null){
                $link = $refer_link;
                $link_name = 'Request Access';
                $content = 'You have been invited to be a member of the Family Investment Exchange (FIVE Network). To join the exclusive network of family office and private investors and access co-investment opportunities alongside high impact investors, please click here to pre-register, or respond to this email with “Please Pre-register me"';
                $subtitle = 'Invitation To Join Family Investment Exchange';
                $subject = 'Invitation To Join Family Investment Exchange';

                Mail::to($email)->send(new Follow($link, $link_name, $content, $subtitle, $subject));
            }
        }

        $referer->submitted = 1;
        $referer->save();

        $msg = ['Success','We have sent your referral link to families','success'];

        return redirect()->route('refer-member',['user' => $referer['email']])->with(['msg' => $msg]);
    }

    public function applymembershipview($code)
    {
        $referer = Preregister::where('code', $code)->first();
        $user = User::where('user_code', $code)->first();
        if(!$referer && !$user){
            return redirect()->route('home');
        }elseif(($referer && !$user)||($referer && $user->is_allowed == 2)){
            return view('auth.applymembership')->with(['user' => $referer, 'submitted' => 0]);
        }else{
            return view('auth.applymembership')->with(['user' => $user, 'submitted' => 1]);
        }
    }

    public function applymembership(Request $request)
    {


        $error1 = 0;

        $preregister = Preregister::where('email',$request['email'])->first();

        $user = User::where('email', $request['email'])->first();

        if(!$user){
            if($request['email'] != $request['email_confirmation']){
                $msg = ['Error','You should confirm your email address !','error'];
                return redirect()->route('apply-membership',['user' => $preregister['code']])->with(['msg' => $msg]);
            }

            if($request['password'] != $request['conf_password']){
                $msg = ['Error','You should confirm your password !','error'];
                return redirect()->route('apply-membership',['user' => $preregister['code']])->with(['msg' => $msg]);
            }
            
            if(isset($request['mobilex']))
                $mobile = $request['mobilex'];
            else
                $mobile = '';
            
           
            if($request['rank_show_deals'] == $request['rank_see_deals'] || $request['rank_show_deals'] == $request['rank_leverage_due_diligence_capability'] || $request['rank_show_deals'] == $request['rank_network_with_other_family_offices'] ||
                $request['rank_see_deals'] == $request['rank_leverage_due_diligence_capability'] || $request['rank_see_deals'] == $request['rank_network_with_other_family_offices'] || $request['rank_leverage_due_diligence_capability'] == $request['rank_network_with_other_family_offices']){
                $msg = ['Error','You input wrong priority of use!','error'];
                return redirect()->route('apply-membership',['user' => $preregister['code']])->with(['msg' => $msg]);
            }else
                $error1 = 0;

            if($request['aware_method_desc_how'])
                $aware_method_desc = $request['aware_method_desc_how'];
            elseif($request['aware_method_desc_who'])
                $aware_method_desc = $request['aware_method_desc_who'];
            $user = User::create([
                'apply_type' => $request['apply_type'],
                'bprinciple' => $request['bprinciple'],
                'email'      => $request['email'],
                'password'   => bcrypt($request['password']),
                'aware_method' => $request['aware_method'],
                'aware_method_desc' => $aware_method_desc,
                'family_office_name' => $request['family_office_name'],
                'fName'      => $request['fName'],
                'lName'      => $request['lName'],
                'title'      => $request['title'],
                'addr_1'     => $request['addr_1'],
                'addr_2'     => $request['addr_2'] ? $request['addr_2']:'',
                'town_city'  => $request['town_city'],
                'state'      => $request['state'],
                'postal_code'=> $request['postal_code'],
                'country'    => $request['country'],
                'phone_office' => $request['phone_office'],
                'phone_mobile' => $mobile,
                'dob'        => $request['dob'],
                'private_investment_number' => $request['private_investment_number'] ? $request['private_investment_number']:0,
                'additional_capacity' => $request['additional_capacity'] ? $request['additional_capacity']:0,
                'professional_history_bio' => $request['professional_history_bio'],
                'family_office_investment_entity' => $request['family_office_investment_entity'],
                'area_family_investor_expertise'  => $request['area_family_investor_expertise'] ? $request['area_family_investor_expertise']:'',
                'networth_aum' => $request['networth_aum'] ? $request['networth_aum']:'',
                'company_website' => $request['company_website'] ? $request['company_website']:'',
                'linkedIn'   => $request['linkedIn'] ? $request['linkedIn']:'',
                'corporate_board' => $request['corporate_board'] ? $request['corporate_board']:'',
                'civic_non_profit_board' => $request['civic_non_profit_board'] ? $request['civic_non_profit_board']:'',
                'education' => $request['education'] ? $request['education']:'',
                'desc_notable_past_investment' => $request['desc_notable_past_investment'] ? $request['desc_notable_past_investment']:'',
                'rank_show_deals' => $request['rank_show_deals'],
                'rank_see_deals'  => $request['rank_see_deals'],
                'rank_leverage_due_diligence_capability' => $request['rank_leverage_due_diligence_capability'],
                'rank_network_with_other_family_offices' => $request['rank_network_with_other_family_offices'],
                'pref_contact_form' => $request['pref_contact_form'] ? $request['pref_contact_form']:0,
                'attest_ai_qp'  => $request['attest_ai_qp'] ? $request['attest_ai_qp']:0,
                'platform_use_case' => $request['platform_use_case'] ? $request['platform_use_case']:0,
                'plan_use_network'  => $request['plan_use_network'],
                'check_back_attest' => $request['check_back_attest'],
                'explain_plan_use_network_no' => $request['explain_plan_use_network_no'] ? $request['explain_plan_use_network_no']: '',
                'understand_agree' => $request['understand_agree'] ? $request['understand_agree']:0,
                'user_code'  => $preregister->code,
                'pre_register_id' => $preregister->id,
                'refer_by' => $preregister->refer_by
            ]);


            if(isset($request['invest_structure'])){
                foreach ($request['invest_structure'] as $is) {
                    $record_is = MemberInvestmentStructure::create([
                        'member_id' => $user->id,
                        'type_id' => $is
                    ]);
                }
            }

            if(isset($request['invest_region'])){
                foreach ($request['invest_region'] as $ir) {
                    $record_is = MemberInvestmentRegion::create([
                        'member_id' => $user->id,
                        'type_id' => $ir
                    ]);
                }
            }
                

            if(isset($request['average_investment_size'])){
                foreach ($request['average_investment_size'] as $ais) {
                    $record_is = MemberInvestmentSize::create([
                        'member_id' => $user->id,
                        'type_id' => $ais
                    ]);
                }
            }
                

            if(isset($request['investment_stage'])){
                foreach ($request['investment_stage'] as $ist) {
                    $record_is = MemberInvestmentStage::create([
                        'member_id' => $user->id,
                        'type_id' => $ist
                    ]);
                }
            }
            
            if(isset($request['investment_sector'])){
                foreach ($request['investment_sector'] as $isr) {
                    $record_is = MemberInvestmentSector::create([
                        'member_id' => $user->id,
                        'type_id' => $isr
                    ]);
                }
            }

        }else{
            if($request['email'] != $request['email_confirmation']){
                $msg = ['Error','You should confirm your email address !','error'];
                return redirect()->route('apply-membership',['user' => $user['user_code']])->with(['msg' => $msg]);
            }

            if($request['password'] != $request['conf_password']){
                $msg = ['Error','You should confirm your password !','error'];
                return redirect()->route('apply-membership',['user' => $user['user_code']])->with(['msg' => $msg]);
            }
            
            if(isset($request['mobilex']))
                $mobile = $request['mobilex'];
            else
                $mobile = '';
            
           
            if($request['rank_show_deals'] == $request['rank_see_deals'] || $request['rank_show_deals'] == $request['rank_leverage_due_diligence_capability'] || $request['rank_show_deals'] == $request['rank_network_with_other_family_offices'] ||
                $request['rank_see_deals'] == $request['rank_leverage_due_diligence_capability'] || $request['rank_see_deals'] == $request['rank_network_with_other_family_offices'] || $request['rank_leverage_due_diligence_capability'] == $request['rank_network_with_other_family_offices']){
                $msg = ['Error','You input wrong priority of use!','error'];
                return redirect()->route('apply-membership',['user' => $user['user_code']])->with(['msg' => $msg]);
            }else
                $error1 = 0;
            

            if($request['aware_method_desc_how'])
                $aware_method_desc = $request['aware_method_desc_how'];
            elseif($request['aware_method_desc_who'])
                $aware_method_desc = $request['aware_method_desc_who'];

            $user->update([
                'apply_type' => $request['apply_type'],
                'bprinciple' => $request['bprinciple'],
                'email'      => $request['email'],
                'password'   => bcrypt($request['password']),
                'aware_method' => $request['aware_method'],
                'aware_method_desc' => $aware_method_desc,
                'family_office_name' => $request['family_office_name'],
                'fName'      => $request['fName'],
                'lName'      => $request['lName'],
                'title'      => $request['title'],
                'addr_1'     => $request['addr_1'],
                'addr_2'     => $request['addr_2'] ? $request['addr_2']:'',
                'town_city'  => $request['town_city'],
                'state'      => $request['state'],
                'postal_code'=> $request['postal_code'],
                'country'    => $request['country'],
                'phone_office' => $request['phone_office'],
                'phone_mobile' => $mobile,
                'dob'        => $request['dob'],
                'private_investment_number' => $request['private_investment_number'] ? $request['private_investment_number']:0,
                'additional_capacity' => $request['additional_capacity'] ? $request['additional_capacity']:0,
                'professional_history_bio' => $request['professional_history_bio'],
                'family_office_investment_entity' => $request['family_office_investment_entity'],
                'area_family_investor_expertise'  => $request['area_family_investor_expertise'] ? $request['area_family_investor_expertise']:'',
                'networth_aum' => $request['networth_aum'] ? $request['networth_aum']:'',
                'company_website' => $request['company_website'] ? $request['company_website']:'',
                'linkedIn'   => $request['linkedIn'] ? $request['linkedIn']:'',
                'corporate_board' => $request['corporate_board'] ? $request['corporate_board']:'',
                'civic_non_profit_board' => $request['civic_non_profit_board'] ? $request['civic_non_profit_board']:'',
                'education' => $request['education'] ? $request['education']:'',
                'desc_notable_past_investment' => $request['desc_notable_past_investment'] ? $request['desc_notable_past_investment']:'',
                'rank_show_deals' => $request['rank_show_deals'],
                'rank_see_deals'  => $request['rank_see_deals'],
                'rank_leverage_due_diligence_capability' => $request['rank_leverage_due_diligence_capability'],
                'rank_network_with_other_family_offices' => $request['rank_network_with_other_family_offices'],
                'pref_contact_form' => $request['pref_contact_form'] ? $request['pref_contact_form']:0,
                'attest_ai_qp'  => $request['attest_ai_qp'] ? $request['attest_ai_qp']:0,
                'platform_use_case' => $request['platform_use_case'] ? $request['platform_use_case']:0,
                'plan_use_network'  => $request['plan_use_network'],
                'check_back_attest' => $request['check_back_attest'],
                'explain_plan_use_network_no' => $request['explain_plan_use_network_no'] ? $request['explain_plan_use_network_no']: '',
                'understand_agree' => $request['understand_agree'] ? $request['understand_agree']:0,
                'is_allowed' => 0
            ]);

            if(isset($request['invest_structure'])){
                $existing_record = MemberInvestmentStructure::where('member_id',$user->id)->get();

                if($existing_record->count()>0)
                    foreach($existing_record as $e_r){
                        $e_r->delete();
                    }
                foreach ($request['invest_structure'] as $is) {
                    $record_is = MemberInvestmentStructure::create([
                        'member_id' => $user->id,
                        'type_id' => $is
                    ]);
                }
            }

            if(isset($request['invest_region'])){
                $existing_record = MemberInvestmentRegion::where('member_id',$user->id)->get();
                if($existing_record->count()>0)
                    foreach($existing_record as $e_r){
                        $e_r->delete();
                    }
                foreach ($request['invest_region'] as $ir) {
                    $record_is = MemberInvestmentRegion::create([
                        'member_id' => $user->id,
                        'type_id' => $ir
                    ]);
                }
            }
                

            if(isset($request['average_investment_size'])){
                $existing_record = MemberInvestmentSize::where('member_id',$user->id)->get();
                if($existing_record->count()>0)
                    foreach($existing_record as $e_r){
                        $e_r->delete();
                    }
                foreach ($request['average_investment_size'] as $ais) {
                    $record_is = MemberInvestmentSize::create([
                        'member_id' => $user->id,
                        'type_id' => $ais
                    ]);
                }
            }
                

            if(isset($request['investment_stage'])){
                $existing_record = MemberInvestmentStage::where('member_id',$user->id)->get();
                if($existing_record->count()>0)
                    foreach($existing_record as $e_r){
                        $e_r->delete();
                    }

                foreach ($request['investment_stage'] as $ist) {
                    $record_is = MemberInvestmentStage::create([
                        'member_id' => $user->id,
                        'type_id' => $ist
                    ]);
                }
            }

            if(isset($request['investment_sector'])){
                $existing_record = MemberInvestmentSector::where('member_id',$user->id)->get();
                if($existing_record->count()>0)
                    foreach($existing_record as $e_r){
                        $e_r->delete();
                    }
                    
                foreach ($request['investment_sector'] as $isr) {
                    $record_is = MemberInvestmentSector::create([
                        'member_id' => $user->id,
                        'type_id' => $isr
                    ]);
                }
            }
        }

        if($error1 == 0){
            // $msg = ['Success','We have sent your membership application to administrator, please wait to be allowed by administrator!','success'];
            $preregister->update(['applied'=>1]);

            $email = $user['email'];
            $link = url('/');
            $link_name = 'no';
            $content = 'Thank you for applying to join the Family Investment Exchange. The FIVE Network membership committee will review your application and upon review you will receive an email with a status of your application. We appreciate your interest and look forward to speaking with you soon.';
            $subtitle = 'Thank you for applying to join the Family Investment Exchange!';
            $subject = 'Thank you for applying to join the Family Investment Exchange';

            Mail::to($email)->send(new Follow($link, $link_name, $content, $subtitle, $subject));

            foreach(Admin::all() as $admin)
            {
                $to = $admin->email;
                $subtitle = 'A Member submitted a membership application!';
                $subject = 'Membership Application – Submitted';
                $content = $user->email.' has submitted application for membership.';
                $link = route('admin.membership-detail',['id' => $user->id]);
                $link_name = 'Go To Dashboard';

                Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));
            }

            // return redirect()->route('apply-membership',['user' => $preregister['code']])->with(['msg' => $msg]);
            return redirect()->route('apply-membership',['user' => $preregister['code']]);
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
