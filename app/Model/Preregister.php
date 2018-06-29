<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Preregister extends Model
{
    protected $table = 'tb_member_preregister';

    public $fillable = ['email','submitted','applied','allowed','code','refer_by'];
}
