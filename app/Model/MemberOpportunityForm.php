<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberOpportunityForm extends Model
{
    protected $table = 'tb_member_opportunity_form';
    protected $fillable = ['member_id','code','bremain_anonymous','name_remain_anonymous','reachout_method','contact_email','project_name','company_desc','headquater_loc','operation_loc','sector_subsector_specialization','investment_structuretype_id','independent_sponsor','offered_stake','amount_seeking_investment','revenue','EBITDA','valuation','structure_term','additional_commentary'];

    public function user()
    {
    	return $this->belongsTo('App\User','member_id','id');
    }

    public function matched()
    {
    	return $this->hasMany('App\Model\MemberOpportunityMatch','opportunity_id');
    }

    public function investment_structure_type()
    {
        return $this->belongsTo('App\Model\InvestmentStructureType','investment_structuretype_id');
    }

}
