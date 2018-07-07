<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberInvestmentStageType extends Model
{
    protected $table = 'tb_member_investment_stage_type';

    public function stage()
    {
    	return $this->hasMany('App\Model\MemberInvestmentStage','id');
    }

    public function questionnaire()
    {
        return $this->hasOne('App\Model\MemberOpportunityForm','id');
    }
}
