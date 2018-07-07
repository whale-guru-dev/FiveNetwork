<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberOpportunityForm extends Model
{
    protected $table = 'tb_member_opportunity_form';
    protected $fillable = ['member_id','code','company_stage','contact_name','fName','lName','phone','email','company_name','company_website','address','city','state','country','current_capital_raise_structure','investment_stage','sector','investment_size','raising_capital','company_found_date','company_desc','products_service','products_service_desc','products_service_desc','bpatent','patent_desc','patent_status','date_field','prior_exp','length_time','prior_company_role','outcome_detail','additional_member','additional_member_name','members_bio_pior_exp','brestrict_convenant','restrict_convenant_desc','primary_competitor','differ_desc_competitor','bcur_contracts_customer','num_customer','revenue_avg_customer','customer_name_1','percent_revenue_1','customer_name_2','percent_revenue_2','customer_name_3','percent_revenue_3','customer_name_4','percent_revenue_4','customer_name_5','percent_revenue_5','contract_duration','cancellation_fee','bcontract_autonew','projected_num_client','client_acq_cost','lifetime_val','desc_marketing','desc_sales_strategy','capital_amt_began','capital_raise_timing','expected_close_date','capital_used_for','bprevious_capital_raise','prior_raise_date','prior_raised_amount','prior_investors','prior_valuation','bfounder_capital_commit','founder_capital_amount','bexpect_future_raise','expect_future_raise_amount','estimated_timing_future_capital','use_additional_fund','name_investor','amount_committed','cur_postmoney_valuation','explanation_valuation','plan_for_growth','bhave_plan_exit_business','anticipated_exit_date','exit_strategy','top_potential_acqu','revenue_target','net_income_target','exit_valuation','prev4_total_revenue','prev4_total_expense','prev4_revenue_expense','prev3_total_revenue','prev3_total_expense','prev3_revenue_expense','prev2_total_revenue','prev2_total_expense','prev2_revenue_expense','prev1_total_revenue','prev1_total_expense','prev1_revenue_expense','cur_total_revenue','cur_total_expense','cur_revenue_expense','percent_cur_revenue','expect_change_over','cash_balance','bhave_debt','debt_creditor','debt_amount','type_debt_rate_maturity_term','prev_quater_total_revenue','prev_quater_total_expense','prev_quater_revenue_expense','prev_month_total_revenue','prev_month_total_expense','prev_month_revenue_expense','next3month_total_revenue','next3month_total_expense','next3month_revenue_expense','cur_month_total_revenue','cur_month_total_expense','cur_month_revenue_expense','expected_cash_flow_break_date'];

    public function user()
    {
    	return $this->belongsTo('App\User','member_id');
    }

    public function matched()
    {
    	return $this->hasMany('App\Model\MemberOpportunityMatch','opportunity_id');
    }

    public function investmentstructure()
    {
        return $this->belongsTo('App\Model\InvestmentStructureType','current_capital_raise_structure');
    }

    public function investmentstage()
    {
        return $this->belongsTo('App\Model\MemberInvestmentStageType','investment_stage');
    }


    public function investmentregion()
    {
        return $this->belongsTo('App\Model\MemberInvestmentRegionType','state');
    }

    public function investmentsector()
    {
        return $this->belongsTo('App\Model\MemberInvestmentSectorType','sector');
    }

}
