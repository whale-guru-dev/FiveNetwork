<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPassword as ResetPasswordNotification;

class Admin extends Authenticatable
{
	use Notifiable;

    protected $table = 'admins';

    protected $fillable = [
     'fName','lName','propic','role','email','username','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function logins()
    {
        return $this->hasMany('App\Model\AdminLogin','admin_id');
    }

}
