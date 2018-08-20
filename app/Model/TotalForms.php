<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TotalForms extends Model
{
    protected $table = 'tb_total_questionnaire_forms';
    protected $fillable = ['type','form_id'];
}
