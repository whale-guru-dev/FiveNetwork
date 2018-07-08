<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberInvestmentRegion extends Model
{
    protected $table = 'tb_member_investment_region';
    public $timestamps = false;
    protected $fillable = ['member_id','type_id'];

    public function user()
    {
    	return $this->belongsTo('App\User','member_id');
    }

    public function type()
    {
    	return $this->belongsTo('App\Model\MemberInvestmentRegionType','type_id');
    }

    public function questionnaire()
    {
        return $this->hasOne('App\Model\MemberOpportunityForm','id');
    }

    public function logins()
    {
        return $this->hasMany('App\Model\MemberLogin','usid');
    }
}
