<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class MemberRequestOpportunity extends Model
{
    protected $table = 'tb_member_request_opportunity';
    protected $fillable = ['usid', 'contact_name', 'email', 'phone', 'opportunity_name', 'investing_amount', 'raising', 'valuation', 'is_accepted', 'code','is_submitted','company_stage'];

    public function user()
    {
    	return $this->belongsTo('App\User','usid','id');
    }
}
