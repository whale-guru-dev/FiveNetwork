<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberInvestmentSize extends Model
{
    protected $table = 'tb_member_average_investment_size';
    protected $fillable = [
        'member_id', 'type_id'
    ];
    public $timestamps = false;

    public function type()
    {
    	return $this->belongsTo('App\Model\MemberInvestmentSizeType','type_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
