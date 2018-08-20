<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberFeedback extends Model
{
    protected $table = 'tb_member_feedback';
    protected $fillable = ['usid', 'feedback'];
}
