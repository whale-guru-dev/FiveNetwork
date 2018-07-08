<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminLogin extends Model
{
    protected $table = 'tb_admin_logins';
    protected $fillable = ['ip_addr','is_active','admin_id','location','device'];

    public function admin()
    {
    	return $this->belongsTo('App\Model\Admin', 'admin_id');
    }
}
