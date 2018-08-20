<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\File;
use App\Mail\Follow;
use App\Model\InvestmentQuestionnaire;
use App\Model\TotalForms;
use App\Model\Admin;


class InvestmentQuestionnaireController extends Controller
{
    public function view()
    {
    	return view('pages.landing.investmentquestionnaire');
    }

    public function savedview($code)
    {
    	$form = InvestmentQuestionnaire::where('code', $code)->first();
    	if($form->is_completed == 0)
    		return view('pages.landing.investmentquestionnaire')->with(['form' => $form]);
    	else
    		return redirect()->route('home');
    }

    public function submitopportunityform(Request $request)
     {
          $form = InvestmentQuestionnaire::where('code', $request['code'])->first();
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
          
          if($request['identity'] == 'submit'){

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
                    return redirect()->route('investment-questionnaire')->with(['msg' => $msg,'status' => $status]);
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
                    return redirect()->route('investment-questionnaire')->with(['msg' => $msg,'status' => $status]);
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
                    return redirect()->route('investment-questionnaire')->with(['msg' => $msg,'status' => $status]);
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
                    return redirect()->route('investment-questionnaire')->with(['msg' => $msg,'status' => $status]);
               }
          }

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
                         'company_stage' => $request['company_stage'],
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
                         'detailed_cap_table' => $detailed_cap_table_name,
                         'is_completed' => 1,
                         'sendto' => $request['sendto']
                    ]);
               }else{
                    $form = InvestmentQuestionnaire::create([
                         'company_stage' => $request['company_stage'],
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
                         'detailed_cap_table' => $detailed_cap_table_name,
                         'code' => $this->generateRandomString(10),
                         'is_completed' => 1,
                         'sendto' => $request['sendto']
                    ]);
               }

            TotalForms::create(['type' => 1, 'form_id' => $form->id]);

               $this->sendEmailTo($form, $form->sendto);

            foreach(Admin::all() as $admin)
            {
                $to = $admin->email;
                $this->sendEmailTo($form, $to);
                $subtitle = 'Deal Room submission has been made.';
                $subject = 'Deal Room submission has been made.';
                $content = $form->fName.' '.$form->lName.'\'s opportunity is completed and a Non Co-Investment Questionnaire is available for review.';
                $link = route('admin.noncoinvestment-detail',['id' => $form->id]);
                $link_name = 'Go To Dashboard';

                Mail::to($to)->send(new Follow($link, $link_name, $content, $subtitle, $subject));
            }

          $msg = ['Success','Successfully Submitted Your Investment Questionnaire','success'];
          $status = 'created';
          return redirect()->route('investment-questionnaire')->with(['msg' => $msg,'status' => $status]);
     }elseif($request['identity'] == 'save'){


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
                    return redirect()->route('saved-investment-questionnaire', ['code'=>$form->code])->with(['msg' => $msg, 'status' => $status]);
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
                    return redirect()->route('saved-investment-questionnaire', ['code'=>$form->code])->with(['msg' => $msg, 'status' => $status]);
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
                    return redirect()->route('saved-investment-questionnaire', ['code'=>$form->code])->with(['msg' => $msg, 'status' => $status]);
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
                    return redirect()->route('saved-investment-questionnaire', ['code'=>$form->code])->with(['msg' => $msg, 'status' => $status]);
               }
          }

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
                         'company_stage' => $request['company_stage'],
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
                         'detailed_cap_table' => $detailed_cap_table_name,
                         'sendto' => $request['sendto']
                    ]);
               }else{
                    $form = InvestmentQuestionnaire::create([
                         'company_stage' => $request['company_stage'],
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
                         'detailed_cap_table' => $detailed_cap_table_name,
                         'code' => $this->generateRandomString(10),
                         'sendto' => $request['sendto']
                    ]);
               }

            $status = 'saved';
            $msg = ['Success','Successfully Saved Your Investment Questionnaire','success'];
            return redirect()->route('saved-investment-questionnaire', ['code'=>$form->code])->with(['msg' => $msg, 'status' => $status]);
        }

        
    }

    public function filedownload($name)
    {
        $path = public_path('assets/dashboard/profile/file/').$name;

        return response()->download($path);
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

    public function sendEmailTo(InvestmentQuestionnaire $form, $to)
    {     
          if($form->company_stage == 3)
          {
               if($form->bhave_debt==0)
                    $have_debt ='No';
               else $have_debt = 'Yes';
               $finance = '
                         <label style="font-weight:bold;">Previous Year</label>
                         <li>Previous Year Total Revenue : '.$form->prev1_total_revenue.'</li>
                         <li>Previous Year Expenses : '.$form->prev1_total_expense.'</li>
                         <li>Previous Year Total Revenue - Total Expenses : '.$form->prev1_revenue_expense.'</li>
                         <label style="font-weight:bold;">Current Year</label>
                         <li>Current Year Total Revenue : '.$form->cur_total_revenue.'</li>
                         <li>Current Year Total Expenses : '.$form->cur_total_expense.'</li>
                         <li>Current Year Total Revenue - Total Expense : '.$form->cur_revenue_expense.'</li>
                         <label style="font-weight:bold;">Next Year</label>
                         <li>Next Year Total Revenue : '.$form->next_total_revenue.'</li>
                         <li>Next Year Total Expenses : '.$form->next_total_expense.'</li>
                         <li>Next Year Total Revenue - Total Expenses : '.$form->next_revenue_expense.'</li>
                         <li>What percent of current revenue is contractually recurring (vs. non-recurring)? : '.$form->percent_cur_revenue.'</li>
                         <li>How do they expect this structure to change over time? : '.$form->expect_change_over.'</li>
                         <li>Cash Balance of Company today : '.$form->cash_balance.'</li>
                         <li>Do you currently have debt? : '.$have_debt.'</li>';
               if($form->bhave_debt==1)
               {
                    $finance = $finance.'<label style="font-weight:bold;">Debt Details</label>
                                        <li>Creditor : '.$form->debt_creditor.'</li>
                                        <li>Amount : '.$form->debt_amount.'</li>
                                        <li>Type of Debt, Rate, Maturity, & Payment Terms : '.$form->type_debt_rate_maturity_term.'</li>';
               }
          }else{
               if($form->bhave_debt==0)
                    $have_debt ='No';
               else $have_debt = 'Yes';
               $finance = '<label style="font-weight:bold;">Previous Year</label>
                         <li>Previous Year Total Revenue : '.$form->prev1_total_revenue.'</li>
                         <li>Previous Year Expenses : '.$form->prev1_total_expense.'</li>
                         <li>Previous Year Total Revenue - Total Expenses : '.$form->prev1_revenue_expense.'</li>
                         <label style="font-weight:bold;">Current Year</label>
                         <li>Current Year Total Revenue : '.$form->cur_total_revenue.'</li>
                         <li>Current Year Total Expenses : '.$form->cur_total_expense.'</li>
                         <li>Current Year Total Revenue - Total Expense : '.$form->cur_revenue_expense.'</li>
                         <label style="font-weight:bold;">Next Year</label>
                         <li>Next Year Total Revenue : '.$form->next_total_revenue.'</li>
                         <li>Next Year Total Expenses : '.$form->next_total_expense.'</li>
                         <li>Next Year Total Revenue - Total Expenses : '.$form->next_revenue_expense.'</li>
                         <li>What percent of current revenue is contractually recurring (vs. non-recurring)? : '.$form->percent_cur_revenue.'</li>
                         <li>How do they expect this structure to change over time? : '.$form->expect_change_over.'</li>
                         <li>Expected Cash Flow Break Even Date : '.$form->expected_cash_flow_break_date.'</li>
                         <li>Cash Balance of Company today : '.$form->cash_balance.'</li>
                         <li>Do you currently have debt? : '.$have_debt.'</li>';
                         if($form->bhave_debt==1)
                         {
                              $finance = $finance.'<label style="font-weight:bold;">Debt Details</label>
                                                  <li>Creditor : '.$form->debt_creditor.'</li>
                                                  <li>Amount : '.$form->debt_amount.'</li>
                                                  <li>Type of Debt, Rate, Maturity, & Payment Terms : '.$form->type_debt_rate_maturity_term.'</li>';
                         }
          }
          if($form->bpatent == 0) $bpatent = 'No';
          else $bpatent = 'Yes';

          if($form->prior_exp == 0) $prior_exp = 'No';
          else $prior_exp = 'Yes';

          if($form->additional_member == 0) $additional_member = 'No';
          else $additional_member = 'Yes';

          if($form->bcur_contracts_customer == 0) $bcur_contracts_customer = 'No';
          else $bcur_contracts_customer = 'Yes';

          
          $subtitle = 'Investment Questionnaire';
          $subject = 'Investment Questionnaire Submission- '.$form->company_name;
          $content = '<label style="font-weight:bold;">General Information :</label>
                    <ul style="text-align:left;">
                       <li>COMPANY NAME : '.$form->company_name.'</li>
                       <li>COMPANY WEBSITE : '.$form->company_website.'</li>
                       <li>OWNER NAME : '.$form->fName.' '.$form->lName.'</li>
                       <li>ADDRESS : '.$form->address.'</li>
                       <li>PHONE : '.$form->phone.'</li>
                       <li>EMAIL : '.$form->email.'</li>
                       <li>DATE COMPANY FOUNDED : '.$form->company_found_date.'</li>
                       <li>INDUSTRY : '.$form->investmentsector->type.'</li>
                       <li>BRIEF DESCRIPTION OF COMPANY AND THE PROBLEM THE COMPANY AIMS TO SOLVE : '.$form->company_desc.'</li>
                    </ul><hr>
                    <label style="font-weight:bold;">Products/Services :</label>
                    <ul style="text-align:left;">
                         <li>PRODUCSTS/SERVICE : '.$form->products_service.'</li>
                         <li>BRIEF DESCRIPTION OF PRODUCT(S)/SERVICE(S) OFFERED AND PRICE POINT : '.$form->products_service_desc.'</li>
                         <li>DO YOU HAVE ANY PATENTS? : '.$bpatent.'</li>
                    </ul><hr>
                    <label style="font-weight:bold;">Management Team :</label>
                    <ul style="text-align:left;">
                         <li>DOES THE OWNER HAVE PRIOR EXPERIENCE IN THE INDUSTRY? : '.$prior_exp.'</li>
                         <li>LENGTH OF TIME IN INDUSTRY : '.$form->length_time.'</li>
                         <li>PRIOR COMPANIES AND ROLES : '.$form->prior_company_role.'</li>
                         <li>ARE THERE ADDITIONAL MEMBERS OF THE MANAGEMENT TEAM? : '.$additional_member.'</li>
                    </ul><hr>
                    <label style="font-weight:bold;">Financial Information :</label>
                    <ul style="text-align:left;">'.$finance.'</ul>
                    <label style="font-weight:bold;">COMPETITORS :</label>
                    <ul style="text-align:left;">
                         <li>PRIMARY COMPETITORS : '.$form->primary_competitor.'</li>
                         <li>DESCRIBE HOW ARE YOU DIFFERENTIATED FROM YOUR COMPETITORS : '.$form->differ_desc_competitor.'</li>
                    </ul><hr>
                    <label style="font-weight:bold;">Customers :</label>
                    <ul style="text-align:left;">
                        <li>ARE CURRENT CONTRACTS IN PLACE WITH CUSTOMERS? : '.$bcur_contracts_customer.'</li>';

               if($form->bcur_contracts_customer==1){
                    if($form->bcontract_autonew == 0) $bcontract_autonew = 'No';
                    else $bcontract_autonew = 'Yes';

                    $content = $content.'
                         <li>NUMBER OF CUSTOMERS TODAY : '.$form->num_customer.'</li>
                         <li>DO THE CONTRACTS AUTO-RENEW? : '.$bcontract_autonew.'</li>
                         <li>BRIEFLY DESCRIBE HOW YOU ARE MARKETING TODAY : '.$form->desc_marketing.'</li>
                         <li>BRIEFLY DESCRIBE YOUR CURRENT SALES STRATEGY TODAY : '.$form->desc_sales_strategy.'</li>
                    </ul><hr>';
               }else{
                    $content = $content.'</ul><hr>';
               }

               if($form->bprevious_capital_raise == 0) $bprevious_capital_raise = 'No';
               else $bprevious_capital_raise = 'Yes';

               $content = $content.'<label style="font-weight:bold;">Capital :</label>
                         <ul style="text-align:left;">
                              <li>AMOUNT OF CAPITAL BUSINESS BEGAN WITH : '.$form->capital_amt_began.'</li>
                              <li>HAVE YOU HAD PREVIOUS CAPITAL RAISES? : '.$bprevious_capital_raise.'</li></ul><hr>';
               if($form->bprevious_capital_raise==1){
                    $content = $content.'<label style="font-weight:bold;">Detail Prior Capital Raises : </label>
                    <ul style="text-align:left;">
                         <li>Date : '.$form->prior_raise_date.'</li>
                         <li>Amount Raised : '.$form->prior_raised_amount.'</li>
                         <li>Previous Investors : '.$form->prior_investors.'</li>
                         <li>Valuation : '.$form->prior_valuation.'</li>
                    </ul><hr>';
               }

               if($form->bfounder_capital_commit == 0) $bfounder_capital_commit = 'No';
               else $bfounder_capital_commit = 'Yes';

               if($form->bexpect_future_raise == 0) $bexpect_future_raise = 'No';
               else $bexpect_future_raise = 'Yes';

               if($form->bhave_plan_exit_business == 0) $bhave_plan_exit_business = 'No';
               else $bhave_plan_exit_business = 'Yes';

               $content = $content.'<ul style="text-align:left;">
                    <li>DOES THE FOUNDER HAVE PERSONAL CAPITAL COMMITTED? : '.$bfounder_capital_commit.'</li>
                    <li>How much? : '.$form->founder_capital_amount.'</li>
                    <li>DO YOU EXPECT ANY FUTURE CAPITAL RAISES? : '.$bexpect_future_raise.'</li>
                    <li>How much? : '.$form->expect_future_raise_amount.'</li>
               </ul><hr>
               <label style="font-weight:bold;">Valuation :</label>
               <ul style="text-align:left;">
                    <li>CURRENT POST-MONEY VALUATION : '.$form->cur_postmoney_valuation.'</li>
                    <li>EXPLANATION OF VALUATION : '.$form->explanation_valuation.'</li>
               </ul><hr>
               <label style="font-weight:bold;">Future of Company :</label>
               <ul style="text-align:left;">
                    <li>WHAT ARE YOUR PLANS FOR GROWTH? : '.$form->plan_for_growth.'</li>
                    <li>DO YOU PLAN TO EXIT THE BUSINESS IN THE FUTURE? : '.$bhave_plan_exit_business.'</li>';
               if($form->bhave_plan_exit_business==1){
                    $content = $content.'<li>PLEASE DESCRIBE EXIT STRATEGY : '.$form->exit_strategy.'</li></ul><hr>
                    <label style="font-weight:bold;">Exit Strategy</label>
                    <ul style="text-align:left;">
                         <li>TOP POTENTIAL ACQUIRERS : '.$form->top_potential_acqu.'</li>
                         <li>REVENUE TARGET : '.$form->revenue_target.'</li>
                         <li>NET INCOME TARGET : '.$form->net_income_target.'</li>
                         <li>EXIT VALUATION : '.$form->exit_valuation.'</li>
                    </ul><hr>
                    ';
               }else
                    $content = $content.'</ul><hr>';

               if($form->prior_year_monthly_finacial) $prior_year_monthly_finacial = $form->prior_year_monthly_finacial;
               else $prior_year_monthly_finacial = 'No File';

               if($form->investor_deck) $investor_deck = $form->investor_deck;
               else $investor_deck = 'No File';

               if($form->proforma_projections) $proforma_projections = $form->proforma_projections;
               else $proforma_projections = 'No File';

               if($form->detailed_cap_table) $detailed_cap_table = $form->detailed_cap_table;
               else $detailed_cap_table = 'No File';

               $content = $content.'<label style="font-weight:bold;">Upload Files :</label>
                    <ul style="text-align:left;">
                         <li>PRIOR YEAR MONTHLY FINANCIALS : '.$prior_year_monthly_finacial.'</li>
                         <li>INVESTOR DECK : '.$investor_deck.'</li>
                         <li>3 YEAR PROFORMA PROJECTIONS : '.$proforma_projections.'</li>
                         <li>DETAILED CAP TABLE : '.$detailed_cap_table.'</li>
                    </ul><hr>
               ';     

               $files = [];
               if($form->prior_year_monthly_finacial) $files[] = public_path('assets/dashboard/profile/file/').$form->prior_year_monthly_finacial;
               if($form->investor_deck) $files[] = public_path('assets/dashboard/profile/file/').$form->investor_deck;
               if($form->proforma_projections) $files[] = public_path('assets/dashboard/profile/file/').$form->proforma_projections;
               if($form->detailed_cap_table) $files[] = public_path('assets/dashboard/profile/file/').$form->detailed_cap_table;

          Mail::to($to)->send(new File($content, $subtitle, $subject, $files));
    }

}
