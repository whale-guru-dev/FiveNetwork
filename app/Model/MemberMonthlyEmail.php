<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberMonthlyEmail extends Model
{
    protected $table = 'tb_member_monthly_gather';
    protected $fillable = ['usid', 'bsubmitted', 'bfindinvestor', 'investor', 'capital', 'largetransaction', 'binvested', 'investor1', 'capital1', 'largetransacton1', 'nopportunity', 'feedback', 'is_answered', 'year', 'month', 'code'];

    public function member()
    {
    	return $this->belongsTo('App\User','usid');
    }
}
