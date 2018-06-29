<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'tb_member_faq';

    protected $fillable = ['question','answer'];
}
