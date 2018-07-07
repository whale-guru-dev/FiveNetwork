<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberInvestmentStructure extends Model
{
    protected $table = 'tb_member_investment_structure';
    protected $fillable = [
        'member_id', 'type_id'
    ];
    public $timestamps = false;

    public function type()
    {
    	return $this->belongsTo('App\Model\InvestmentStructureType','type_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

}
