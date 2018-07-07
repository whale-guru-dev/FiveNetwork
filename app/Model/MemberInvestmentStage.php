<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberInvestmentStage extends Model
{
    protected $table = 'tb_member_investment_stage';
    protected $fillable = [
        'member_id', 'type_id'
    ];
    public $timestamps = false;

    public function type()
    {
    	return $this->belongsTo('App\Model\MemberInvestmentStageType','type_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function questionnaire()
    {
        return $this->hasMany('App\Model\MemberOpportunityForm','id');
    }
}
