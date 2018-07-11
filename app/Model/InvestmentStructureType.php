<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InvestmentStructureType extends Model
{
    protected $table = 'tb_member_investment_structure_type';

    public function structure()
    {
    	return $this->hasMany('App\Model\MemberInvestmentStructure','id');
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
