<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberLogin extends Model
{
    protected $table = 'tb_member_logins';
    protected $fillable = ['ip_addr','is_active','usid','location','device','long','lat','code','is_usa'];

    public function member()
    {
    	return $this->belongsTo('App\User','usid');
    }
}
