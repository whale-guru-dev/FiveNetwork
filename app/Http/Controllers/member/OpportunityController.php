<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\MemberRequestOpportunity;
use App\Model\MemberOpportunityForm;
use App\Model\MemberInvestmentStructure;
use App\Model\MemberOpportunityMatch;
use Mail;
use App\Mail\Follow;
use App\User;
use App\Model\Admin;
use App\Model\MemberSimpleOpportunity;
use App\Model\MemberSimpleOpportunityMatch;
use App\Model\TotalForms;
use App\Model\MemberDealMatch;
use App\Model\InvestmentQuestionnaire;

class OpportunityController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function requestview()
    {
    	return view('pages.member.requestopportunity');
    }

    public function request(Request $request)
    {
        $prior_year_monthly_finacial_name = '';
        $investor_deck_name = '';
        $proforma_projections_name = '';
        $detailed_cap_table_name = '';

        if($request->hasFile('prior_year_monthly_finacial')){

               $prior_year_monthly_finacial = $request->file('prior_year_monthly_finacial');

               $prior_year_monthly_finacial_name = 'prior-year-monthly-finacial-'.$this->generateRandomString(10).'.'.$prior_year_monthly_finacial->getClientOriginalExtension();

               $destinationPath = public_path('assets/dashboard/profile/file');

               if($prior_year_monthly_finacial->move($destinationPath, $prior_year_monthly_finacial_name)){
                    $error3 = 0;
               }else{
                    $error3 = 1;
                    $msg = ['Error','There was an error on uploading your file for Prior Year Monthly Financials! Pleae try again.','error'];
                    $status = 'upload';
                    return redirect()->route('member.submit-opportunity')->with(['msg' => $msg]);
               }
          }

          if($request->hasFile('investor_deck')){

               $investor_deck = $request->file('investor_deck');

               $investor_deck_name = 'investor-deck-'.$this->generateRandomString(10).'.'.$investor_deck->getClientOriginalExtension();

               $destinationPath = public_path('assets/dashboard/profile/file');

               if($investor_deck->move($destinationPath, $investor_deck_name)){
                    $error4 = 0;
               }else{
                    $error4 = 1;
                    $msg = ['Error','There was an error on uploading your file for Investor Deck! Pleae try again.','error'];
                    $status = 'upload';
                    return redirect()->route('member.submit-opportunity')->with(['msg' => $msg]);
               }
          }
          

          if($request->hasFile('proforma_projections')){

               $proforma_projections = $request->file('proforma_projections');

               $proforma_projections_name = 'proforma-projections-'.$this->generateRandomString(10).'.'.$proforma_projections->getClientOriginalExtension();

               $destinationPath = public_path('assets/dashboard/profile/file');

               if($proforma_projections->move($destinationPath, $proforma_projections_name)){
                    $error5 = 0;
               }else{
                    $error5 = 1;
                    $msg = ['Error','There was an error on uploading your file for 3 Year Proforma Projections! Pleae try again.','error'];
                    $status = 'upload';
                    return redirect()->route('member.submit-opportunity')->with(['msg' => $msg]);
               }
          }
          

          if($request->hasFile('detailed_cap_table')){

               $detailed_cap_table = $request->file('detailed_cap_table');

               $detailed_cap_table_name = 'detailed-cap-table-'.$this->generateRandomString(10).'.'.$detailed_cap_table->getClientOriginalExtension();

               $destinationPath = public_path('assets/dashboard/profile/file');

               if($detailed_cap_table->move($destinationPath, $detailed_cap_table_name)){
                    $error6 = 0;
               }else{
                    $error6 = 1;
                    $msg = ['Error','There was an error on uploading your file for Detailed Cap Table! Pleae try again.','error'];
                    $status = 'upload';
                    return redirect()->route('member.submit-opportunity')->with(['msg' => $msg]);
               }
          }

    	$request_opp = MemberRequestOpportunity::create([
    		'usid' => Auth::user()->id,
            'company_name' => $request['company_name'],
            'contact_name' => $request['contact_name'],
    		'email' => $request['email'],
    		'phone' => $request['phone'],
    		'investing_amount' => $request['investing_amount'],
    		'raising' => $request['raising'],
    		'valuation' => $request['valuation'],
            'company_stage' => $request['company_stage'],
    		'code' => $this->generateRandomString(10),
            'investment_sector' => $request['investment_sector'],
            'investment_region' => $request['investment_region'],
            'investment_structure' => $request['investment_structure'],
            'prior_year_monthly_finacial' => $prior_year_monthly_finacial_name,
            'investor_deck' => $investor_deck_name,
            'proforma_projections' => $proforma_projections_name,
            'detailed_cap_table' => $detailed_cap_table_name
    	]);
        if($request['company_stage'] == 1)
            $company_stage = 'Pre-Revenue/Seed';
        elseif($request['company_stage'] == 2)
            $company_stage = 'Early Stage/Venture Capital';
        elseif($request['company_stage'] == 3)
            $company_stage = 'Private Equity';

    	if($request_opp){
            $to = Auth::user()->email;
            $subtitle = 'Successfully submitted a Co-Investment Opportunity';
            $subject = 'Submitted a Co-Investment Opportunity';
            $content = 'Thank you for submitting an opportunity for co-investment with the FIVE Network. A member of the FIVE Network will reach out to you in order to learn more about the specifics of this opportunity and find the best co-investment partners.';
            $link = url('/member');
            $link_name = 'Go To Dashboard';


            Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));

            if($request_opp->prior_year_monthly_finacial) $prior_year_monthly_finacial = $request_opp->prior_year_monthly_finacial;
           else $prior_year_monthly_finacial = 'No File';

           if($request_opp->investor_deck) $investor_deck = $request_opp->investor_deck;
           else $investor_deck = 'No File';

           if($request_opp->proforma_projections) $proforma_projections = $request_opp->proforma_projections;
           else $proforma_projections = 'No File';

           if($request_opp->detailed_cap_table) $detailed_cap_table = $request_opp->detailed_cap_table;
           else $detailed_cap_table = 'No File';

            foreach(Admin::all() as $admin)
            {
                $to = $admin->email;
                $subtitle = 'A member submitted a Co-Investment Opportunity';
                $subject = 'A member submitted a Co-Investment Opportunity';
                $content = 'A member of the FIVE Network has submitted an opportunity for co-investment. Below are the details submitted:<br>
                    <ul style="text-align:left;">
                        <li>Submitter of Opportunity : '.Auth::user()->fName.' '.Auth::user()->lName.'</li>
                        <li>Company Name : '.$request['company_name'].'</li>
                        <li>Contact Name : '.$request['contact_name'].'</li>
                        <li>Email : '.$request['email'].'</li>
                        <li>Phone number : '.$request['phone'].'</li>
                        <li>Stage : '.$company_stage.'</li>
                        <li>Investment Sector : '.$request_opp->investmentsector->type.'</li>
                        <li>Investment Region : '.$request_opp->investmentregion->type.'</li>
                        <li>Investment Structure : '.$request_opp->investmentstructure->type.'</li>
                        <li>Amount Investing : '.$request['investing_amount'].'</li>
                        <li>Total Investment Company is looking to Raise : '.$request['raising'].'</li>
                        <li>Amount Available for FIVE Network members : $'.number_format($request['valuation'], 0, '.',',').'</li>
                        <label style="font-weight:bold;">Upload Files :</label>
                         <li>PRIOR YEAR MONTHLY FINANCIALS : '.$prior_year_monthly_finacial.'</li>
                         <li>INVESTOR DECK : '.$investor_deck.'</li>
                         <li>3 YEAR PROFORMA PROJECTIONS : '.$proforma_projections.'</li>
                         <li>DETAILED CAP TABLE : '.$detailed_cap_table.'</li>
                    </ul>';
                $link = url('/admin');
                $link_name = 'Go To Dashboard';

                $files = [];
                if($request_opp->prior_year_monthly_finacial) $files[] = public_path('assets/dashboard/profile/file/').$request_opp->prior_year_monthly_finacial;
                if($request_opp->investor_deck) $files[] = public_path('assets/dashboard/profile/file/').$request_opp->investor_deck;
                if($request_opp->proforma_projections) $files[] = public_path('assets/dashboard/profile/file/').$request_opp->proforma_projections;
                if($request_opp->detailed_cap_table) $files[] = public_path('assets/dashboard/profile/file/').$request_opp->detailed_cap_table;
    
                Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject, $files));
            }

    		$msg = ['Co-Investment Opportunity was successfully submitted','Successfully Requested','success'];
    		return redirect()->route('member.submit-opportunity')->with(['msg' => $msg]);
    	}
    }

    public function generateRandomString($length = 6) 
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    public function verifiedopportunityview()
    {
        $usid = Auth::user()->id;
        $oppors = MemberOpportunityMatch::where('matched_member_id', $usid)->where('is_allowed', 1)->get();
        $oppors_deal = MemberDealMatch::where('matched_member_id', $usid)->where('is_allowed', 1)->get();
        $oppors_simple = MemberSimpleOpportunityMatch::where('matched_member_id', $usid)->where('is_allowed', 1)->get();
        return view('pages.member.verifiedopportunity')->with(['oppors' => $oppors, 'deals' => $oppors_deal, 'simples' => $oppors_simple]);
    }

    public function detailopportunity($id)
    {
        $usid = Auth::user()->id;
        $matched_oppor = MemberOpportunityMatch::where('matched_member_id', $usid)->where('opportunity_id', $id)->first();
        if($matched_oppor){
            $oppor = MemberOpportunityForm::find($id);
            return view('pages.member.detailopportunity')->with(['oppor' => $oppor,'matched_oppor' => $matched_oppor]);
        }else{
          $oppor = MemberOpportunityForm::find($id);
          if($oppor->member_id == $usid){
            return view('pages.member.detailopportunity')->with(['oppor' => $oppor,'matched_oppor' => 'no']);
            // return redirect()->route('member.verified-opportunity');
          }
        }
    }

    public function interestopportunity(Request $request)
    {
        $id = $request['id'];
        $usid = Auth::user()->id;
        $matched_oppor = MemberOpportunityMatch::where('matched_member_id', $usid)->where('id', $id)->where('is_allowed' ,1)->first();
        $matched_oppor->update(['binterest' => 1]);
        

        $to = $matched_oppor->opportunity->user->email; 
        $to1 = $matched_oppor->matchedMember->email; 
        $submittor = $matched_oppor->opportunity->user->fName.' '.$matched_oppor->opportunity->user->lName;
        $interested_party = Auth::user()->fName.' '.Auth::user()->lName;
        $subtitle = 'FIVE Network Introduction';
        $subject = 'FIVE Network Introduction';
        $content = 'The FIVE Network would like to connect '.$interested_party.' to '.$submittor.' for the purposes of discussing your potential investment opportunity.<br>Thanks, <br> The FIVE Network';
        
        $link = '';
        $link_name = 'no';

        Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));
        Mail::to($to1)->send(new Follow($link, $link_name, $content, $subtitle, $subject));

        $content1 = $submittor.'<br>'.$interested_party.' has expressed interest in learning more about your investment opportunity. I will leave it to you both to connect as your schedules allow.';

        Mail::to($to)->send(new Follow($link, $link_name, $content1, $subtitle, $subject));

        $msg = ['Success', 'Successfully Expressed your interest','success'];
        return redirect()->route('member.opportunity-detail',['id' => $matched_oppor->opportunity_id])->with(['msg' => $msg]);
    }

    public function nointerestopportunity(Request $request)
    {
        $id = $request['id'];
        $usid = Auth::user()->id;
        $matched_oppor = MemberOpportunityMatch::where('matched_member_id', $usid)->where('opportunity_id', $id)->where('is_allowed', 1)->first();
        $matched_oppor->update(['binterest' => 2]);
        $msg = ['Success', 'Successfully Expressed your no interest','success'];
        return redirect()->route('member.opportunity-detail',['id' => $matched_oppor->opportunity_id])->with(['msg' => $msg]);
    }

    public function viewall()
    {
        $requests = MemberRequestOpportunity::where('usid', Auth::user()->id)->get();
        $deals = MemberSimpleOpportunity::where('usid', Auth::user()->id)->get();
        return view('pages.member.opportunity')->with(['requests' => $requests, 'deals' => $deals]);
    }

    public function detailrequestopportunity($id)
    {
        $request = MemberRequestOpportunity::where('id',$id)->where('usid',Auth::user()->id)->first();
        return view('pages.member.detailrequestopportunity')->with(['request' => $request]);
    }

    public function detaildealroomopportunity($id)
    {
        $request = MemberSimpleOpportunity::where('id',$id)->where('usid',Auth::user()->id)->first();
        return view('pages.member.detaildealroomopportunity')->with(['request' => $request]);
    }

    public function submitsimpledealview()
    {
        return view('pages.member.submitsimpledeal');
    }

    public function submitsimpledeal(Request $request)
    {
        $prior_year_monthly_finacial_name = '';
        $investor_deck_name = '';
        $proforma_projections_name = '';
        $detailed_cap_table_name = '';

        if($request->hasFile('prior_year_monthly_finacial')){

               $prior_year_monthly_finacial = $request->file('prior_year_monthly_finacial');

               $prior_year_monthly_finacial_name = 'prior-year-monthly-finacial-'.$this->generateRandomString(10).'.'.$prior_year_monthly_finacial->getClientOriginalExtension();

               $destinationPath = public_path('assets/dashboard/profile/file');

               if($prior_year_monthly_finacial->move($destinationPath, $prior_year_monthly_finacial_name)){
                    $error3 = 0;
               }else{
                    $error3 = 1;
                    $msg = ['Error','There was an error on uploading your file for Prior Year Monthly Financials! Pleae try again.','error'];
                    $status = 'upload';
                    return redirect()->route('member.submit-simple-deal-view')->with(['msg' => $msg]);
               }
          }

          if($request->hasFile('investor_deck')){

               $investor_deck = $request->file('investor_deck');

               $investor_deck_name = 'investor-deck-'.$this->generateRandomString(10).'.'.$investor_deck->getClientOriginalExtension();

               $destinationPath = public_path('assets/dashboard/profile/file');

               if($investor_deck->move($destinationPath, $investor_deck_name)){
                    $error4 = 0;
               }else{
                    $error4 = 1;
                    $msg = ['Error','There was an error on uploading your file for Investor Deck! Pleae try again.','error'];
                    $status = 'upload';
                    return redirect()->route('member.submit-simple-deal-view')->with(['msg' => $msg]);
               }
          }
          

          if($request->hasFile('proforma_projections')){

               $proforma_projections = $request->file('proforma_projections');

               $proforma_projections_name = 'proforma-projections-'.$this->generateRandomString(10).'.'.$proforma_projections->getClientOriginalExtension();

               $destinationPath = public_path('assets/dashboard/profile/file');

               if($proforma_projections->move($destinationPath, $proforma_projections_name)){
                    $error5 = 0;
               }else{
                    $error5 = 1;
                    $msg = ['Error','There was an error on uploading your file for 3 Year Proforma Projections! Pleae try again.','error'];
                    $status = 'upload';
                    return redirect()->route('member.submit-simple-deal-view')->with(['msg' => $msg]);
               }
          }
          

          if($request->hasFile('detailed_cap_table')){

               $detailed_cap_table = $request->file('detailed_cap_table');

               $detailed_cap_table_name = 'detailed-cap-table-'.$this->generateRandomString(10).'.'.$detailed_cap_table->getClientOriginalExtension();

               $destinationPath = public_path('assets/dashboard/profile/file');

               if($detailed_cap_table->move($destinationPath, $detailed_cap_table_name)){
                    $error6 = 0;
               }else{
                    $error6 = 1;
                    $msg = ['Error','There was an error on uploading your file for Detailed Cap Table! Pleae try again.','error'];
                    $status = 'upload';
                    return redirect()->route('member.submit-simple-deal-view')->with(['msg' => $msg]);
               }
          }

        $request_opp = MemberSimpleOpportunity::create([
            'usid' => Auth::user()->id,
            'company_name' => $request['company_name'],
            'fName' => $request['fName'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'investing_amount' => $request['investing_amount'],
            'raising_capital' => $request['raising'],
            'investment_size' => $request['valuation'],
            'company_stage' => $request['company_stage'],
            'code' => $this->generateRandomString(10),
            'investment_sector' => $request['investment_sector'],
            'investment_region' => $request['investment_region'],
            'current_capital_raise_structure' => $request['investment_structure'],
            'prior_year_monthly_finacial' => $prior_year_monthly_finacial_name,
            'investor_deck' => $investor_deck_name,
            'proforma_projections' => $proforma_projections_name,
            'detailed_cap_table' => $detailed_cap_table_name
        ]);

        TotalForms::create(['type' => 2, 'form_id' => $request_opp->id]);

        if($request['company_stage'] == 1)
            $company_stage = 'Pre-Revenue/Seed';
        elseif($request['company_stage'] == 2)
            $company_stage = 'Early Stage/Venture Capital';
        elseif($request['company_stage'] == 3)
            $company_stage = 'Private Equity';

        if($request_opp){
            $to = Auth::user()->email;
            $subtitle = 'Investment Opportunity submitted to the Deal Room';
            $subject = 'Investment Opportunity submitted to the Deal Room';
            $content = 'Thank you for submitting an opportunity to the Deal Room for FIVE Network members to access. The Investment Opportunity will appear in the Deal Room after being approved by the FIVE Network team. Once approved, members of the FIVE Network will be able to review this opportunity for investment.';
            $link = url('/member');
            $link_name = 'Go To Dashboard';


            Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));

            if($request_opp->prior_year_monthly_finacial) $prior_year_monthly_finacial = $request_opp->prior_year_monthly_finacial;
           else $prior_year_monthly_finacial = 'No File';

           if($request_opp->investor_deck) $investor_deck = $request_opp->investor_deck;
           else $investor_deck = 'No File';

           if($request_opp->proforma_projections) $proforma_projections = $request_opp->proforma_projections;
           else $proforma_projections = 'No File';

           if($request_opp->detailed_cap_table) $detailed_cap_table = $request_opp->detailed_cap_table;
           else $detailed_cap_table = 'No File';

            foreach(Admin::all() as $admin)
            {
                $to = $admin->email;
                $subtitle = 'A member submitted a Investment Opportunity';
                $subject = 'A member submitted a Investment Opportunity';
                $content = 'A member of the FIVE Network has submitted a Investment Opportunity. Below are the details submitted:<br>
                    <ul style="text-align:left;">
                        <li>Submitter of Deal : '.Auth::user()->fName.' '.Auth::user()->lName.'</li>
                        <li>Company Name : '.$request['company_name'].'</li>
                        <li>Contact Name : '.$request['fName'].' '.$request['lName'].'</li>
                        <li>Email : '.$request['email'].'</li>
                        <li>Phone number : '.$request['phone'].'</li>
                        <li>Stage : '.$company_stage.'</li>
                        <li>Investment Sector : '.$request_opp->investmentsector->type.'</li>
                        <li>Investment Region : '.$request_opp->investmentregion->type.'</li>
                        <li>Investment Structure : '.$request_opp->investmentstructure->type.'</li>
                        <li>Total Investment Company is looking to Raise : '.$request['raising'].'</li>
                        <li>Amount Available for FIVE Network members : $'.number_format($request['valuation'], 0, '.',',').'</li>
                        <label style="font-weight:bold;">Upload Files :</label>
                         <li>PRIOR YEAR MONTHLY FINANCIALS : '.$prior_year_monthly_finacial.'</li>
                         <li>INVESTOR DECK : '.$investor_deck.'</li>
                         <li>3 YEAR PROFORMA PROJECTIONS : '.$proforma_projections.'</li>
                         <li>DETAILED CAP TABLE : '.$detailed_cap_table.'</li>
                    </ul>';
                $link = url('/admin');
                $link_name = 'Go To Dashboard';

                $files = [];
                if($request_opp->prior_year_monthly_finacial) $files[] = public_path('assets/dashboard/profile/file/').$request_opp->prior_year_monthly_finacial;
                if($request_opp->investor_deck) $files[] = public_path('assets/dashboard/profile/file/').$request_opp->investor_deck;
                if($request_opp->proforma_projections) $files[] = public_path('assets/dashboard/profile/file/').$request_opp->proforma_projections;
                if($request_opp->detailed_cap_table) $files[] = public_path('assets/dashboard/profile/file/').$request_opp->detailed_cap_table;
    
                Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject, $files));
            }

            $msg = ['Success','Successfully Requested','success'];
            return redirect()->route('member.submit-simple-deal-view')->with(['msg' => $msg]);
        }
    }


    public function closesimpledeal(Request $request)
    {
        $msd = MemberSimpleOpportunity::find($request['id']);
        $msd->is_active = 0;
        $msd->save();
        $msg = ['Success','Successfully Set Status as Closed','success'];
        return redirect()->route('member.dealroomopportunity-detail', ['id' => $msd->id])->with(['msg' => $msg]);
    }


    public function closesumitopportunity(Request $request)
    {
        $requestopportuniy = MemberRequestOpportunity::where('id', $request['id'])->first();
        $requestopportuniy->is_active = 0;
        $requestopportuniy->save();

        $oppor = MemberOpportunityForm::where('code', $requestopportuniy->code)->first();
        if($oppor){
            $oppor->is_active = 0;
            $oppor->save();
        }

        $msg = ['Success','Successfully Set Status as Closed','success'];
        return redirect()->route('member.requestopportunity-detail',['id'=>$request['id']])->with(['msg' => $msg]);
    }

    public function closecoinvest(Request $request)
    {
      $oppor = MemberOpportunityForm::find($request['id']);

      $oppor->is_active = 0;
      $oppor->save();


      $msg = ['Success','Successfully Set Status as Closed','success'];
      return redirect()->route('member.opportunity-detail',['id'=>$request['id']])->with(['msg' => $msg]);
    }

    public function expressopportunity(Request $request)
    {
      $option = $request['express_oppor'];
      $date = $request['express_date'];
      $code = $request['code'];
      $usid = Auth::user()->id;
      if(MemberOpportunityForm::where('code', $code)->first()){
          $oppor = MemberOpportunityForm::where('code', $code)->first();
          $matched_oppor = MemberOpportunityMatch::where('matched_member_id', $usid)->where('opportunity_id', $oppor->id)->first();
      }
      elseif(InvestmentQuestionnaire::where('code', $code)->first()){
          $oppor = InvestmentQuestionnaire::where('code', $code)->first();
          $matched_oppor = MemberDealMatch::where('matched_member_id', $usid)->where('opportunity_id', $oppor->id)->first();
      }elseif(MemberSimpleOpportunity::where('code', $code)->first()){
          $oppor = MemberSimpleOpportunity::where('code', $code)->first();
          $matched_oppor = MemberSimpleOpportunityMatch::where('matched_member_id', $usid)->where('opportunity_id', $oppor->id)->first();
      }

      if($matched_oppor){

        $matched_oppor->bmet = 0;
        $matched_oppor->bevaluat = 0;
        $matched_oppor->bnoevaluate = 0;
        $matched_oppor->bopen = 0;

        foreach($option as $each){
          if($each == 0)
            $matched_oppor->bmet = 1;
          elseif($each == 1)
            $matched_oppor->bevaluat = 1;
          elseif($each == 2)
            $matched_oppor->bnoevaluate = 1;
          elseif($each == 3)
            $matched_oppor->bopen = 1;
        }
        
        $matched_oppor->express_date = $date;
        $matched_oppor->save();
      }

      $msg = ['Success', 'Successfully Expressed', 'success'];
      return redirect()->route('member.detail-investment-questionnaire',['code' => $code])->with(['msg' => $msg]);

    }


}
