<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberSimpleOpportunity extends Model
{
    protected $table = 'tb_member_simple_opportunity';
    protected $fillable = ['usid', 'company_name','fName','lName', 'email', 'phone', 'investing_amount', 'raising_capital', 'investment_size',  'code','company_stage','investment_sector','investment_region','current_capital_raise_structure','is_allowed','is_active','prior_year_monthly_finacial',
        'investor_deck','proforma_projections','detailed_cap_table'];

    public function user()
    {
    	return $this->belongsTo('App\User','usid','id');
    }

    public function investmentstructure()
    {
        return $this->belongsTo('App\Model\InvestmentStructureType','current_capital_raise_structure');
    }


    public function investmentregion()
    {
        return $this->belongsTo('App\Model\MemberInvestmentRegionType','investment_region');
    }

    public function investmentsector()
    {
        return $this->belongsTo('App\Model\MemberInvestmentSectorType','investment_sector');
    }

}
