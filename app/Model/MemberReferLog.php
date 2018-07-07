<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberReferLog extends Model
{
    protected $table = 'tb_member_refer_log';
    protected $fillable = ['usid', 'referer_email'];
}
