<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email', 
        'propic',
        'password',
        'apply_type',
        'bprinciple',
        'email',
        'password',
        'aware_method',
        'aware_method_desc',
        'family_office_name',
        'fName',
        'lName',
        'title',
        'addr_1',
        'addr_2',
        'town_city',
        'state',
        'postal_code',
        'country',
        'phone_office',
        'phone_mobile',
        'dob',
        'private_investment_number',
        'additional_capacity',
        'professional_history_bio',
        'family_office_investment_entity',
        'area_family_investor_expertise',
        'networth_aum',
        'company_website',
        'linkedIn',
        'corporate_board',
        'civic_non_profit_board',
        'education',
        'desc_notable_past_investment',
        'rank_show_deals',
        'rank_see_deals',
        'rank_leverage_due_diligence_capability',
        'rank_network_with_other_family_offices',
        'pref_contact_form',
        'attest_ai_qp',
        'platform_use_case',
        'plan_use_network',
        'check_back_attest',
        'explain_plan_use_network_no',
        'understand_agree',
        'user_code',
        'pre_register_id',
        'is_allowed',
        'refer_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function investmentstructure()
    {
        return $this->hasMany('App\Model\MemberInvestmentStructure','member_id');
    }

    public function investmentstage()
    {
        return $this->hasMany('App\Model\MemberInvestmentStage','member_id');
    }

    public function investmentsize()
    {
        return $this->hasMany('App\Model\MemberInvestmentSize','member_id');
    }

    public function investmentregion()
    {
        return $this->hasMany('App\Model\MemberInvestmentRegion','member_id');
    }

    public function investmentsector()
    {
        return $this->hasMany('App\Model\MemberInvestmentSector','member_id');
    }

    public function requestopportunity()
    {
        return $this->hasMany('App\Model\MemberRequestOpportunity','usid');
    }

    public function submitopportunityform()
    {
        return $this->hasMany('App\Model\MemberOpportunityForm','member_id');
    }

    public function opportunitymatch()
    {
        return $this->hasMany('App\Model\MemberOpportunityMatch','matched_member_id');
    }

    public function login()
    {
        return $this->hasMany('App\Model\MemberLogin','id');
    }

    public function monthly()
    {
        return $this->hasMany('App\Model\MemberMonthlyEmail', 'usid');
    }
}
