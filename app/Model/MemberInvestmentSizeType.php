<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberInvestmentSizeType extends Model
{
    protected $table = 'tb_member_average_investment_size_type';

    public function size()
    {
    	return $this->hasMany('App\Model\MemberInvestmentSize','type_id');
    }
    
}
