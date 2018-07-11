<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberInvestmentSectorType extends Model
{
    protected $table = 'tb_member_investment_sector_type';

    public function sector()
    {
    	return $this->hasMany('App\Model\MemberInvestmentSector','type_id');
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
