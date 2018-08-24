<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\MemberRequestOpportunity;
use App\Model\MemberOpportunityForm;
use App\Model\MemberInvestmentStructure;
use App\Model\MemberOpportunityMatch;
use Mail;
use App\Mail\Follow;
use App\User;
use App\Model\Admin;
use App\Model\TotalForms;

class InvestmentOpportunityFormController extends Controller
{
    public function submitopportunityformview($code)
    {
     $opportunitymember = MemberRequestOpportunity::where('code',$code)->where('is_submitted',0)->first();
        if($opportunitymember){
            return view('pages.landing.submitopportunityform')->with(['opportunitymember' => $opportunitymember,'submitted' => 0]);
        }else{
            $opportunitymember = MemberRequestOpportunity::where('code',$code)->where('is_submitted',1)->first();
            return view('pages.landing.submitopportunityform')->with(['opportunitymember' => $opportunitymember,'submitted' => 1]);
        }
    }

    public function submitopportunityform(Request $request)
    {
          $opportunity = MemberRequestOpportunity::where('code',$request['code'])->first();
          $form = MemberOpportunityForm::where('code', $request['code'])->first();
          // $msg = [];
          // $status = '';
          if($form && isset($form->prior_year_monthly_finacial))
               $prior_year_monthly_finacial_name = $form->prior_year_monthly_finacial;
          else $prior_year_monthly_finacial_name='';
          
          if($form && isset($form->investor_deck))
               $investor_deck_name = $form->investor_deck;
          else $investor_deck_name='';

          if($form && isset($form->proforma_projections))
               $proforma_projections_name = $form->proforma_projections;
          else $proforma_projections_name='';

          if($form && isset($form->detailed_cap_table))
               $detailed_cap_table_name = $form->detailed_cap_table;
          else $detailed_cap_table_name='';

          if($request->hasFile('prior_year_monthly_finacial')){

               $prior_year_monthly_finacial = $request->file('prior_year_monthly_finacial');

               $prior_year_monthly_finacial_name = 'prior-year-monthly-finacial-'.$request['code'].'.'.$prior_year_monthly_finacial->getClientOriginalExtension();

               $destinationPath = public_path('assets/dashboard/profile/file');

               if($prior_year_monthly_finacial->move($destinationPath, $prior_year_monthly_finacial_name)){
                    $error3 = 0;
               }else{
                    $error3 = 1;
                    $msg = ['Error','There was an error on uploading your file for Prior Year Monthly Financials! Pleae try again.','error'];
                    $status = 'upload';

                    return redirect()->route('investment-questionnaire-form',['code' => $form->code])->with(['msg' => $msg,'status' => $status]);
               }
          }

          if($request->hasFile('investor_deck')){

               $investor_deck = $request->file('investor_deck');

               $investor_deck_name = 'investor-deck-'.$request['code'].'.'.$investor_deck->getClientOriginalExtension();

               $destinationPath = public_path('assets/dashboard/profile/file');

               if($investor_deck->move($destinationPath, $investor_deck_name)){
                    $error4 = 0;
               }else{
                    $error4 = 1;
                    $msg = ['Error','There was an error on uploading your file for Investor Deck! Pleae try again.','error'];
                    $status = 'upload';

                    return redirect()->route('investment-questionnaire-form',['code' => $form->code])->with(['msg' => $msg,'status' => $status]);
               }
          }
          

          if($request->hasFile('proforma_projections')){

               $proforma_projections = $request->file('proforma_projections');

               $proforma_projections_name = 'proforma-projections-'.$request['code'].'.'.$proforma_projections->getClientOriginalExtension();

               $destinationPath = public_path('assets/dashboard/profile/file');

               if($proforma_projections->move($destinationPath, $proforma_projections_name)){
                    $error5 = 0;
               }else{
                    $error5 = 1;
                    $msg = ['Error','There was an error on uploading your file for 3 Year Proforma Projections! Pleae try again.','error'];
                    $status = 'upload';

                    return redirect()->route('investment-questionnaire-form',['code' => $form->code])->with(['msg' => $msg,'status' => $status]);
               }
          }
          

          if($request->hasFile('detailed_cap_table')){

               $detailed_cap_table = $request->file('detailed_cap_table');

               $detailed_cap_table_name = 'detailed-cap-table-'.$request['code'].'.'.$detailed_cap_table->getClientOriginalExtension();

               $destinationPath = public_path('assets/dashboard/profile/file');

               if($detailed_cap_table->move($destinationPath, $detailed_cap_table_name)){
                    $error6 = 0;
               }else{
                    $error6 = 1;
                    $msg = ['Error','There was an error on uploading your file for Detailed Cap Table! Pleae try again.','error'];
                    $status = 'upload';

                    return redirect()->route('investment-questionnaire-form',['code' => $form->code])->with(['msg' => $msg,'status' => $status]);
               }
          }
          

          if($request['identity'] == 'submit'){
            
               if($form){
                    $form->update([
                         'fName' => $request['fName'],
                         'lName' => $request['lName'],
                         'phone' => $request['phone'],
                         'email' => $request['email'],
                         'company_name' => $request['company_name'],
                         'company_website' => $request['company_website'],
                         'address' => $request['address'],
                         'city' => $request['city'],
                         'state' => $request['state'],
                         'country' => $request['country'],
                         'current_capital_raise_structure' => $request['current_capital_raise_structure'],
                         'investment_stage' => $request['investment_stage'],
                         'sector' => $request['sector'],
                         'investment_size' =>$request['investment_size'],
                         'raising_capital' => $request['raising_capital'],
                         'company_found_date' => $request['company_found_date'],
                         'company_desc' => $request['company_desc'],
                         'products_service' => $request['products_service'],
                         'products_service_desc' => $request['products_service_desc'],
                         'bpatent' => $request['bpatent'],
                         'patent_desc' => $request['patent_desc'],
                         'patent_status' => $request['patent_status'],
                         'date_field' => $request['date_field'],
                         'prior_exp' => $request['prior_exp'],
                         'length_time' => $request['length_time'],
                         'prior_company_role' => $request['prior_company_role'],
                         'outcome_detail' => $request['outcome_detail'],
                         'additional_member' => $request['additional_member'],
                         'additional_member_name' => $request['additional_member_name'],
                         'members_bio_pior_exp' => $request['members_bio_pior_exp'],
                         'brestrict_convenant' => $request['brestrict_convenant'],
                         'restrict_convenant_desc' => $request['restrict_convenant_desc'],
                         'next_total_revenue' => $request['next_total_revenue']?$request['next_total_revenue']:0,
                         'next_total_expense' => $request['next_total_expense']?$request['next_total_expense']:0,
                         'next_revenue_expense' => $request['next_revenue_expense']?$request['next_revenue_expense']:0,
                         'prev1_total_revenue' => $request['prev1_total_revenue']?$request['prev1_total_revenue']:0,
                         'prev1_total_expense' => $request['prev1_total_expense']?$request['prev1_total_expense']:0,
                         'prev1_revenue_expense' => $request['prev1_revenue_expense']?$request['prev1_revenue_expense']:0,
                         'cur_total_revenue' => $request['cur_total_revenue']?$request['cur_total_revenue']:0,
                         'cur_total_expense' => $request['cur_total_expense']?$request['cur_total_expense']:0,
                         'cur_revenue_expense' => $request['cur_revenue_expense']?$request['cur_revenue_expense']:0,
                         'percent_cur_revenue' => $request['percent_cur_revenue'],
                         'expect_change_over' => $request['expect_change_over'],
                         'cash_balance' => $request['cash_balance'],
                         'bhave_debt' => $request['bhave_debt'],
                         'debt_creditor' => $request['debt_creditor'],
                         'debt_amount' => $request['debt_amount'],
                         'type_debt_rate_maturity_term' => $request['type_debt_rate_maturity_term'],
                         'expected_cash_flow_break_date' => $request['expected_cash_flow_break_date']?$request['expected_cash_flow_break_date']:0,
                         'primary_competitor' => $request['primary_competitor'],
                         'differ_desc_competitor' => $request['differ_desc_competitor'],
                         'bcur_contracts_customer' => $request['bcur_contracts_customer'],
                         'num_customer' => $request['num_customer'],
                         'revenue_avg_customer' => $request['revenue_avg_customer'],
                         'customer_name_1' => $request['customer_name_1'],
                         'percent_revenue_1' => $request['percent_revenue_1'],
                         'customer_name_2' => $request['customer_name_2'],
                         'percent_revenue_2' => $request['percent_revenue_2'],
                         'customer_name_3' => $request['customer_name_3'],
                         'percent_revenue_3' => $request['percent_revenue_3'],
                         'customer_name_3' => $request['customer_name_4'],
                         'percent_revenue_4' => $request['percent_revenue_4'],
                         'customer_name_5' => $request['customer_name_5'],
                         'percent_revenue_5' => $request['percent_revenue_5'],
                         'contract_duration' => $request['contract_duration'],
                         'cancellation_fee'  => $request['cancellation_fee'],
                         'bcontract_autonew' => $request['bcontract_autonew'],
                         'projected_num_client' => $request['projected_num_client'],
                         'client_acq_cost' => $request['client_acq_cost'],
                         'lifetime_val' => $request['lifetime_val'],
                         'desc_marketing' => $request['desc_marketing'],
                         'desc_sales_strategy' => $request['desc_sales_strategy'],
                         'capital_amt_began' => $request['capital_amt_began'],
                         'capital_raise_timing' => $request['capital_raise_timing'],
                         'expected_close_date' => $request['expected_close_date'],
                         'capital_used_for' => $request['capital_used_for'],
                         'bprevious_capital_raise' => $request['bprevious_capital_raise'],
                         'prior_raise_date' => $request['prior_raise_date'],
                         'prior_raised_amount' => $request['prior_raised_amount'],
                         'prior_investors' => $request['prior_investors'],
                         'prior_valuation' => $request['prior_valuation'],
                         'bfounder_capital_commit' => $request['bfounder_capital_commit'],
                         'founder_capital_amount' => $request['founder_capital_amount'],
                         'bexpect_future_raise' => $request['bexpect_future_raise'],
                         'expect_future_raise_amount' => $request['expect_future_raise_amount'],
                         'estimated_timing_future_capital' => $request['estimated_timing_future_capital'],
                         'use_additional_fund' => $request['use_additional_fund'],
                         'bprevious_investor_reinvest' => $request['bprevious_investor_reinvest'],
                         'name_investor' => $request['name_investor'],
                         'amount_committed' => $request['amount_committed'],
                         'cur_postmoney_valuation' => $request['cur_postmoney_valuation'],
                         'explanation_valuation' => $request['explanation_valuation'],
                         'plan_for_growth' => $request['plan_for_growth'],
                         'bhave_plan_exit_business' => $request['bhave_plan_exit_business'],
                         'anticipated_exit_date' => $request['anticipated_exit_date'],
                         'exit_strategy' => $request['exit_strategy'],
                         'top_potential_acqu' => $request['top_potential_acqu'],
                         'revenue_target' => $request['revenue_target'],
                         'net_income_target' => $request['net_income_target'],
                         'exit_valuation' => $request['exit_valuation'],
                         'prior_year_monthly_finacial' => $prior_year_monthly_finacial_name,
                         'investor_deck' => $investor_deck_name,
                         'proforma_projections' => $proforma_projections_name,
                         'detailed_cap_table' => $detailed_cap_table_name
                    ]);
               }else{
                    $form = MemberOpportunityForm::create([
                         'member_id' => $opportunity->user->id,
                         'code' => $request['code'],
                         'company_stage' => $opportunity->company_stage,
                         'fName' => $request['fName'],
                         'lName' => $request['lName'],
                         'phone' => $request['phone'],
                         'email' => $request['email'],
                         'company_name' => $request['company_name'],
                         'company_website' => $request['company_website'],
                         'address' => $request['address'],
                         'city' => $request['city'],
                         'state' => $request['state'],
                         'country' => $request['country'],
                         'current_capital_raise_structure' => $request['current_capital_raise_structure'],
                         'investment_stage' => $request['investment_stage'],
                         'sector' => $request['sector'],
                         'investment_size' =>$request['investment_size'],
                         'raising_capital' => $request['raising_capital'],
                         'company_found_date' => $request['company_found_date'],
                         'company_desc' => $request['company_desc'],
                         'products_service' => $request['products_service'],
                         'products_service_desc' => $request['products_service_desc'],
                         'bpatent' => $request['bpatent'],
                         'patent_desc' => $request['patent_desc'],
                         'patent_status' => $request['patent_status'],
                         'date_field' => $request['date_field'],
                         'prior_exp' => $request['prior_exp'],
                         'length_time' => $request['length_time'],
                         'prior_company_role' => $request['prior_company_role'],
                         'outcome_detail' => $request['outcome_detail'],
                         'additional_member' => $request['additional_member'],
                         'additional_member_name' => $request['additional_member_name'],
                         'members_bio_pior_exp' => $request['members_bio_pior_exp'],
                         'brestrict_convenant' => $request['brestrict_convenant'],
                         'restrict_convenant_desc' => $request['restrict_convenant_desc'],
                         'next_total_revenue' => $request['next_total_revenue']?$request['next_total_revenue']:0,
                         'next_total_expense' => $request['next_total_expense']?$request['next_total_expense']:0,
                         'next_revenue_expense' => $request['next_revenue_expense']?$request['next_revenue_expense']:0,
                         'prev1_total_revenue' => $request['prev1_total_revenue']?$request['prev1_total_revenue']:0,
                         'prev1_total_expense' => $request['prev1_total_expense']?$request['prev1_total_expense']:0,
                         'prev1_revenue_expense' => $request['prev1_revenue_expense']?$request['prev1_revenue_expense']:0,
                         'cur_total_revenue' => $request['cur_total_revenue']?$request['cur_total_revenue']:0,
                         'cur_total_expense' => $request['cur_total_expense']?$request['cur_total_expense']:0,
                         'cur_revenue_expense' => $request['cur_revenue_expense']?$request['cur_revenue_expense']:0,
                         'percent_cur_revenue' => $request['percent_cur_revenue'],
                         'expect_change_over' => $request['expect_change_over'],
                         'cash_balance' => $request['cash_balance'],
                         'bhave_debt' => $request['bhave_debt'],
                         'debt_creditor' => $request['debt_creditor'],
                         'debt_amount' => $request['debt_amount'],
                         'type_debt_rate_maturity_term' => $request['type_debt_rate_maturity_term'],
                         'expected_cash_flow_break_date' => $request['expected_cash_flow_break_date']?$request['expected_cash_flow_break_date']:0,
                         'primary_competitor' => $request['primary_competitor'],
                         'differ_desc_competitor' => $request['differ_desc_competitor'],
                         'bcur_contracts_customer' => $request['bcur_contracts_customer'],
                         'num_customer' => $request['num_customer'],
                         'revenue_avg_customer' => $request['revenue_avg_customer'],
                         'customer_name_1' => $request['customer_name_1'],
                         'percent_revenue_1' => $request['percent_revenue_1'],
                         'customer_name_2' => $request['customer_name_2'],
                         'percent_revenue_2' => $request['percent_revenue_2'],
                         'customer_name_3' => $request['customer_name_3'],
                         'percent_revenue_3' => $request['percent_revenue_3'],
                         'customer_name_3' => $request['customer_name_4'],
                         'percent_revenue_4' => $request['percent_revenue_4'],
                         'customer_name_5' => $request['customer_name_5'],
                         'percent_revenue_5' => $request['percent_revenue_5'],
                         'contract_duration' => $request['contract_duration'],
                         'cancellation_fee'  => $request['cancellation_fee'],
                         'bcontract_autonew' => $request['bcontract_autonew'],
                         'projected_num_client' => $request['projected_num_client'],
                         'client_acq_cost' => $request['client_acq_cost'],
                         'lifetime_val' => $request['lifetime_val'],
                         'desc_marketing' => $request['desc_marketing'],
                         'desc_sales_strategy' => $request['desc_sales_strategy'],
                         'capital_amt_began' => $request['capital_amt_began'],
                         'capital_raise_timing' => $request['capital_raise_timing'],
                         'expected_close_date' => $request['expected_close_date'],
                         'capital_used_for' => $request['capital_used_for'],
                         'bprevious_capital_raise' => $request['bprevious_capital_raise'],
                         'prior_raise_date' => $request['prior_raise_date'],
                         'prior_raised_amount' => $request['prior_raised_amount'],
                         'prior_investors' => $request['prior_investors'],
                         'prior_valuation' => $request['prior_valuation'],
                         'bfounder_capital_commit' => $request['bfounder_capital_commit'],
                         'founder_capital_amount' => $request['founder_capital_amount'],
                         'bexpect_future_raise' => $request['bexpect_future_raise'],
                         'expect_future_raise_amount' => $request['expect_future_raise_amount'],
                         'estimated_timing_future_capital' => $request['estimated_timing_future_capital'],
                         'use_additional_fund' => $request['use_additional_fund'],
                         'bprevious_investor_reinvest' => $request['bprevious_investor_reinvest'],
                         'name_investor' => $request['name_investor'],
                         'amount_committed' => $request['amount_committed'],
                         'cur_postmoney_valuation' => $request['cur_postmoney_valuation'],
                         'explanation_valuation' => $request['explanation_valuation'],
                         'plan_for_growth' => $request['plan_for_growth'],
                         'bhave_plan_exit_business' => $request['bhave_plan_exit_business'],
                         'anticipated_exit_date' => $request['anticipated_exit_date'],
                         'exit_strategy' => $request['exit_strategy'],
                         'top_potential_acqu' => $request['top_potential_acqu'],
                         'revenue_target' => $request['revenue_target'],
                         'net_income_target' => $request['net_income_target'],
                         'exit_valuation' => $request['exit_valuation'],
                         'prior_year_monthly_finacial' => $prior_year_monthly_finacial_name,
                         'investor_deck' => $investor_deck_name,
                         'proforma_projections' => $proforma_projections_name,
                         'detailed_cap_table' => $detailed_cap_table_name
                    ]);
               }

            $opportunity->update(['is_submitted' => 1]);

            TotalForms::create(['type' => 0, 'form_id' => $form->id]);

            $whole_member = User::where('id', '!=', $opportunity->usid)->get();

            foreach($whole_member as $each_member)
               $this->checkmatch($opportunity, $each_member);
            // $this->checkmatch($opportunity,$form->id);

            // $to = $form->user->email;
            $to = $opportunity->email;
            $subtitle = 'Thank you for completing the Investment Questionnaire';
            $subject = 'Investment Questionnaire – Completed';
            $content = 'Thank you for submitting your investment opportunity to the Family Investment Exchange. We will reach out to you if a member of the Family Investment Exchange has an interest in investing in this opportunity.';
            $link = route('home');
            $link_name = 'no';

            Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));

            foreach(Admin::all() as $admin)
            {
                $to = $admin->email;
                $subtitle = 'A member submitted an Investment Questionnaire!';
                $subject = 'A member submitted an Investment Questionnaire!';
                $content = $form->fName.' '.$form->lName.'\'s opportunity, submitted by '.$opportunity->user->fName.' '.$opportunity->user->lName.' is completed and an Investment Questionnaire is available for review.';
                $link = route('admin.opportunity-detail',['id' => $form->id]);
                $link_name = 'Go To Dashboard';

                Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));
            }

            $msg = ['Success','Successfully Submitted Your Investment Questionnaire','success'];
            $status = 'created';
        }elseif($request['identity'] == 'save'){

               if($form){
                    $form->update([
                         'fName' => $request['fName'],
                         'lName' => $request['lName'],
                         'phone' => $request['phone'],
                         'email' => $request['email'],
                         'company_name' => $request['company_name'],
                         'company_website' => $request['company_website'],
                         'address' => $request['address'],
                         'city' => $request['city'],
                         'state' => $request['state'],
                         'country' => $request['country'],
                         'current_capital_raise_structure' => $request['current_capital_raise_structure'],
                         'investment_stage' => $request['investment_stage'],
                         'sector' => $request['sector'],
                         'investment_size' =>$request['investment_size'],
                         'raising_capital' => $request['raising_capital'],
                         'company_found_date' => $request['company_found_date'],
                         'company_desc' => $request['company_desc'],
                         'products_service' => $request['products_service'],
                         'products_service_desc' => $request['products_service_desc'],
                         'bpatent' => $request['bpatent'],
                         'patent_desc' => $request['patent_desc'],
                         'patent_status' => $request['patent_status'],
                         'date_field' => $request['date_field'],
                         'prior_exp' => $request['prior_exp'],
                         'length_time' => $request['length_time'],
                         'prior_company_role' => $request['prior_company_role'],
                         'outcome_detail' => $request['outcome_detail'],
                         'additional_member' => $request['additional_member'],
                         'additional_member_name' => $request['additional_member_name'],
                         'members_bio_pior_exp' => $request['members_bio_pior_exp'],
                         'brestrict_convenant' => $request['brestrict_convenant'],
                         'restrict_convenant_desc' => $request['restrict_convenant_desc'],
                         'next_total_revenue' => $request['next_total_revenue']?$request['next_total_revenue']:0,
                         'next_total_expense' => $request['next_total_expense']?$request['next_total_expense']:0,
                         'next_revenue_expense' => $request['next_revenue_expense']?$request['next_revenue_expense']:0,
                         'prev1_total_revenue' => $request['prev1_total_revenue']?$request['prev1_total_revenue']:0,
                         'prev1_total_expense' => $request['prev1_total_expense']?$request['prev1_total_expense']:0,
                         'prev1_revenue_expense' => $request['prev1_revenue_expense']?$request['prev1_revenue_expense']:0,
                         'cur_total_revenue' => $request['cur_total_revenue']?$request['cur_total_revenue']:0,
                         'cur_total_expense' => $request['cur_total_expense']?$request['cur_total_expense']:0,
                         'cur_revenue_expense' => $request['cur_revenue_expense']?$request['cur_revenue_expense']:0,
                         'percent_cur_revenue' => $request['percent_cur_revenue'],
                         'expect_change_over' => $request['expect_change_over'],
                         'cash_balance' => $request['cash_balance'],
                         'bhave_debt' => $request['bhave_debt'],
                         'debt_creditor' => $request['debt_creditor'],
                         'debt_amount' => $request['debt_amount'],
                         'type_debt_rate_maturity_term' => $request['type_debt_rate_maturity_term'],
                         'expected_cash_flow_break_date' => $request['expected_cash_flow_break_date']?$request['expected_cash_flow_break_date']:0,
                         'primary_competitor' => $request['primary_competitor'],
                         'differ_desc_competitor' => $request['differ_desc_competitor'],
                         'bcur_contracts_customer' => $request['bcur_contracts_customer'],
                         'num_customer' => $request['num_customer'],
                         'revenue_avg_customer' => $request['revenue_avg_customer'],
                         'customer_name_1' => $request['customer_name_1'],
                         'percent_revenue_1' => $request['percent_revenue_1'],
                         'customer_name_2' => $request['customer_name_2'],
                         'percent_revenue_2' => $request['percent_revenue_2'],
                         'customer_name_3' => $request['customer_name_3'],
                         'percent_revenue_3' => $request['percent_revenue_3'],
                         'customer_name_3' => $request['customer_name_4'],
                         'percent_revenue_4' => $request['percent_revenue_4'],
                         'customer_name_5' => $request['customer_name_5'],
                         'percent_revenue_5' => $request['percent_revenue_5'],
                         'contract_duration' => $request['contract_duration'],
                         'cancellation_fee'  => $request['cancellation_fee'],
                         'bcontract_autonew' => $request['bcontract_autonew'],
                         'projected_num_client' => $request['projected_num_client'],
                         'client_acq_cost' => $request['client_acq_cost'],
                         'lifetime_val' => $request['lifetime_val'],
                         'desc_marketing' => $request['desc_marketing'],
                         'desc_sales_strategy' => $request['desc_sales_strategy'],
                         'capital_amt_began' => $request['capital_amt_began'],
                         'capital_raise_timing' => $request['capital_raise_timing'],
                         'expected_close_date' => $request['expected_close_date'],
                         'capital_used_for' => $request['capital_used_for'],
                         'bprevious_capital_raise' => $request['bprevious_capital_raise'],
                         'prior_raise_date' => $request['prior_raise_date'],
                         'prior_raised_amount' => $request['prior_raised_amount'],
                         'prior_investors' => $request['prior_investors'],
                         'prior_valuation' => $request['prior_valuation'],
                         'bfounder_capital_commit' => $request['bfounder_capital_commit'],
                         'founder_capital_amount' => $request['founder_capital_amount'],
                         'bexpect_future_raise' => $request['bexpect_future_raise'],
                         'expect_future_raise_amount' => $request['expect_future_raise_amount'],
                         'estimated_timing_future_capital' => $request['estimated_timing_future_capital'],
                         'use_additional_fund' => $request['use_additional_fund'],
                         'bprevious_investor_reinvest' => $request['bprevious_investor_reinvest'],
                         'name_investor' => $request['name_investor'],
                         'amount_committed' => $request['amount_committed'],
                         'cur_postmoney_valuation' => $request['cur_postmoney_valuation'],
                         'explanation_valuation' => $request['explanation_valuation'],
                         'plan_for_growth' => $request['plan_for_growth'],
                         'bhave_plan_exit_business' => $request['bhave_plan_exit_business'],
                         'anticipated_exit_date' => $request['anticipated_exit_date'],
                         'exit_strategy' => $request['exit_strategy'],
                         'top_potential_acqu' => $request['top_potential_acqu'],
                         'revenue_target' => $request['revenue_target'],
                         'net_income_target' => $request['net_income_target'],
                         'exit_valuation' => $request['exit_valuation'],
                         'prior_year_monthly_finacial' => $prior_year_monthly_finacial_name,
                         'investor_deck' => $investor_deck_name,
                         'proforma_projections' => $proforma_projections_name,
                         'detailed_cap_table' => $detailed_cap_table_name
                    ]);
               }else{
                    $form = MemberOpportunityForm::create([
                         'member_id' => $opportunity->user->id,
                         'code' => $request['code'],
                         'company_stage' => $opportunity->company_stage,
                         'fName' => $request['fName'],
                         'lName' => $request['lName'],
                         'phone' => $request['phone'],
                         'email' => $request['email'],
                         'company_name' => $request['company_name'],
                         'company_website' => $request['company_website'],
                         'address' => $request['address'],
                         'city' => $request['city'],
                         'state' => $request['state'],
                         'country' => $request['country'],
                         'current_capital_raise_structure' => $request['current_capital_raise_structure'],
                         'investment_stage' => $request['investment_stage'],
                         'sector' => $request['sector'],
                         'investment_size' =>$request['investment_size'],
                         'raising_capital' => $request['raising_capital'],
                         'company_found_date' => $request['company_found_date'],
                         'company_desc' => $request['company_desc'],
                         'products_service' => $request['products_service'],
                         'products_service_desc' => $request['products_service_desc'],
                         'bpatent' => $request['bpatent'],
                         'patent_desc' => $request['patent_desc'],
                         'patent_status' => $request['patent_status'],
                         'date_field' => $request['date_field'],
                         'prior_exp' => $request['prior_exp'],
                         'length_time' => $request['length_time'],
                         'prior_company_role' => $request['prior_company_role'],
                         'outcome_detail' => $request['outcome_detail'],
                         'additional_member' => $request['additional_member'],
                         'additional_member_name' => $request['additional_member_name'],
                         'members_bio_pior_exp' => $request['members_bio_pior_exp'],
                         'brestrict_convenant' => $request['brestrict_convenant'],
                         'restrict_convenant_desc' => $request['restrict_convenant_desc'],
                         'next_total_revenue' => $request['next_total_revenue']?$request['next_total_revenue']:0,
                         'next_total_expense' => $request['next_total_expense']?$request['next_total_expense']:0,
                         'next_revenue_expense' => $request['next_revenue_expense']?$request['next_revenue_expense']:0,
                         'prev1_total_revenue' => $request['prev1_total_revenue']?$request['prev1_total_revenue']:0,
                         'prev1_total_expense' => $request['prev1_total_expense']?$request['prev1_total_expense']:0,
                         'prev1_revenue_expense' => $request['prev1_revenue_expense']?$request['prev1_revenue_expense']:0,
                         'cur_total_revenue' => $request['cur_total_revenue']?$request['cur_total_revenue']:0,
                         'cur_total_expense' => $request['cur_total_expense']?$request['cur_total_expense']:0,
                         'cur_revenue_expense' => $request['cur_revenue_expense']?$request['cur_revenue_expense']:0,
                         'percent_cur_revenue' => $request['percent_cur_revenue'],
                         'expect_change_over' => $request['expect_change_over'],
                         'cash_balance' => $request['cash_balance'],
                         'bhave_debt' => $request['bhave_debt'],
                         'debt_creditor' => $request['debt_creditor'],
                         'debt_amount' => $request['debt_amount'],
                         'type_debt_rate_maturity_term' => $request['type_debt_rate_maturity_term'],
                         'expected_cash_flow_break_date' => $request['expected_cash_flow_break_date']?$request['expected_cash_flow_break_date']:0,
                         'primary_competitor' => $request['primary_competitor'],
                         'differ_desc_competitor' => $request['differ_desc_competitor'],
                         'bcur_contracts_customer' => $request['bcur_contracts_customer'],
                         'num_customer' => $request['num_customer'],
                         'revenue_avg_customer' => $request['revenue_avg_customer'],
                         'customer_name_1' => $request['customer_name_1'],
                         'percent_revenue_1' => $request['percent_revenue_1'],
                         'customer_name_2' => $request['customer_name_2'],
                         'percent_revenue_2' => $request['percent_revenue_2'],
                         'customer_name_3' => $request['customer_name_3'],
                         'percent_revenue_3' => $request['percent_revenue_3'],
                         'customer_name_3' => $request['customer_name_4'],
                         'percent_revenue_4' => $request['percent_revenue_4'],
                         'customer_name_5' => $request['customer_name_5'],
                         'percent_revenue_5' => $request['percent_revenue_5'],
                         'contract_duration' => $request['contract_duration'],
                         'cancellation_fee'  => $request['cancellation_fee'],
                         'bcontract_autonew' => $request['bcontract_autonew'],
                         'projected_num_client' => $request['projected_num_client'],
                         'client_acq_cost' => $request['client_acq_cost'],
                         'lifetime_val' => $request['lifetime_val'],
                         'desc_marketing' => $request['desc_marketing'],
                         'desc_sales_strategy' => $request['desc_sales_strategy'],
                         'capital_amt_began' => $request['capital_amt_began'],
                         'capital_raise_timing' => $request['capital_raise_timing'],
                         'expected_close_date' => $request['expected_close_date'],
                         'capital_used_for' => $request['capital_used_for'],
                         'bprevious_capital_raise' => $request['bprevious_capital_raise'],
                         'prior_raise_date' => $request['prior_raise_date'],
                         'prior_raised_amount' => $request['prior_raised_amount'],
                         'prior_investors' => $request['prior_investors'],
                         'prior_valuation' => $request['prior_valuation'],
                         'bfounder_capital_commit' => $request['bfounder_capital_commit'],
                         'founder_capital_amount' => $request['founder_capital_amount'],
                         'bexpect_future_raise' => $request['bexpect_future_raise'],
                         'expect_future_raise_amount' => $request['expect_future_raise_amount'],
                         'estimated_timing_future_capital' => $request['estimated_timing_future_capital'],
                         'use_additional_fund' => $request['use_additional_fund'],
                         'bprevious_investor_reinvest' => $request['bprevious_investor_reinvest'],
                         'name_investor' => $request['name_investor'],
                         'amount_committed' => $request['amount_committed'],
                         'cur_postmoney_valuation' => $request['cur_postmoney_valuation'],
                         'explanation_valuation' => $request['explanation_valuation'],
                         'plan_for_growth' => $request['plan_for_growth'],
                         'bhave_plan_exit_business' => $request['bhave_plan_exit_business'],
                         'anticipated_exit_date' => $request['anticipated_exit_date'],
                         'exit_strategy' => $request['exit_strategy'],
                         'top_potential_acqu' => $request['top_potential_acqu'],
                         'revenue_target' => $request['revenue_target'],
                         'net_income_target' => $request['net_income_target'],
                         'exit_valuation' => $request['exit_valuation'],
                         'prior_year_monthly_finacial' => $prior_year_monthly_finacial_name,
                         'investor_deck' => $investor_deck_name,
                         'proforma_projections' => $proforma_projections_name,
                         'detailed_cap_table' => $detailed_cap_table_name
                    ]);
               }

            $status = 'saved';
            $msg = ['Success','Successfully Saved Your Investment Questionnaire','success'];
        }

        
        return redirect()->route('investment-questionnaire-form',['code' => $form->code])->with(['msg' => $msg,'status' => $status]);
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
            $match_member_oppor = MemberOpportunityMatch::where('opportunity_id',$oppor_id)->where('matched_member_id',$new_user->id)->first();
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
    }

    public function sendemail(Request $request)
    {
        $email = $request['email'];
        $code = $request['code'];
        $type = $request['type'];
        if($email){
            $to = $email;
            $subtitle = 'Family Investment Exchange Investment Questionnaire Form Link!';
            $subject = 'Family Investment Exchange Investment Questionnaire Form Link!';

            
            if($type == 0){
               $content = 'You can use this link '.route('investment-questionnaire-form',['code' => $code]).' to continue your progress';
               $link = route('investment-questionnaire-form',['code' => $code]);
            }
               
           elseif($type == 1){
               $content = 'You can use this link '.route('saved-investment-questionnaire',['code' => $code]).' to continue your progress';
               $link = route('saved-investment-questionnaire',['code' => $code]);
           }
               
            $link_name = 'Continue your progress';

            Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));

            return response()->json(['status' => 'ok', 'content' => 'The email has been sent.']);
        }else
            return response()->json(['status' => 'error','content' => 'You have to input email.']);
    }

    public function filedownload($name)
    {
        $path = public_path('assets/dashboard/profile/file/').$name;

        return response()->file($path);
    }
}
