<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberSimpleOpportunityMatch extends Model
{
    protected $table = 'tb_member_simple_opportunity_match';
    public $timestamps = false;

    protected $fillable = ['opportunity_id', 'matched_member_id','binterest','score','reason','matched_structure','matched_stage','matched_state','matched_sector','matched_size','is_allowed','bmet','bevaluat','bnoevaluate','bopen','express_date'];

    public function matchedMember()
    {
    	return $this->belongsTo('App\User', 'matched_member_id');
    }

    public function opportunity()
    {
    	return $this->belongsTo('App\Model\MemberSimpleOpportunity','opportunity_id');
    }
}
