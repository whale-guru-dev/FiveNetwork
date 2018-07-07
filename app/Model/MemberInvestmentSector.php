<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberInvestmentSector extends Model
{
    //
    protected $table = 'tb_member_investment_sector';
    protected $fillable = ['member_id','type_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function type()
    {
    	return $this->belongsTo('App\Model\MemberInvestmentSectorType','type_id');
    }
}
