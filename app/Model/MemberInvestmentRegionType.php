<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberInvestmentRegionType extends Model
{
	protected $table = 'tb_member_investment_region_type';
	
    public function region()
    {
    	return $this->hasMany('App\Model\MemberInvestmentRegion','type_id');
    }

    public function questionnaire()
    {
        return $this->hasOne('App\Model\MemberOpportunityForm','id');
    }

    public function request_oppor()
    {
        return $this->hasOne('App\Model\MemberRequestOpportunity','id');
    }
}
