<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class MemberRequestOpportunity extends Model
{
    protected $table = 'tb_member_request_opportunity';
    protected $fillable = ['usid', 'company_name', 'contact_name', 'email', 'phone', 'investing_amount', 'raising', 'valuation', 'is_accepted', 'code','is_submitted','company_stage','investment_sector','investment_region','investment_structure','prior_year_monthly_finacial',
        'investor_deck','proforma_projections','detailed_cap_table','is_active'];

    public function user()
    {
    	return $this->belongsTo('App\User','usid','id');
    }

    public function investmentstructure()
    {
        return $this->belongsTo('App\Model\InvestmentStructureType','investment_structure');
    }


    public function investmentregion()
    {
        return $this->belongsTo('App\Model\MemberInvestmentRegionType','investment_region');
    }

    public function investmentsector()
    {
        return $this->belongsTo('App\Model\MemberInvestmentSectorType','investment_sector');
    }

    public function oppor_form()
    {
        return $this->belongsTo('App\Model\MemberOpportunityForm', 'code');
    }
}
