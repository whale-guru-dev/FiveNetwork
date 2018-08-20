<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use App\Model\MemberInvestmentStructure;
use App\Model\MemberInvestmentSize;
use App\Model\MemberInvestmentStage;
use App\Model\MemberInvestmentRegion;
use App\Model\MemberInvestmentSector;
use App\Model\MemberRequestOpportunity;
use App\Model\MemberOpportunityForm;
use App\Model\MemberOpportunityMatch;
use App\User;
use App\Model\InvestmentQuestionnaire;
use App\Model\MemberDealMatch;
use App\Model\MemberSimpleOpportunity;
use App\Model\MemberSimpleOpportunityMatch;

class EditProfileController extends Controller
{
	protected $hasher;

    public function __construct(HasherContract $hasher)
    {
        $this->middleware('auth');
        $this->hasher = $hasher;
    }

    public function editapplicantinfo(Request $request)
    {
    	$user = Auth::user();
    	if($request['password'] != null){
    		if($request['password'] == $request['conf_password']){
    			if($this->hasher->check($request['original_password'], $user->getAuthPassword())){
    				$user->update(['password'=>bcrypt($request['password'])]);
    			}else{
    				$msg = ['Error','You input wrong original password !','error'];
    				return redirect()->route('member.profile')->with(['msg'=>$msg]);
    			}
    		}else{
				$msg = ['Error','Your confirmation password should be matched with your new password !','error'];
				return redirect()->route('member.profile')->with(['msg'=>$msg]);
    		}
    	}

    	if($request->hasFile('profile_photo')){
            
            $profile_photo = $request->file('profile_photo');

            $profile_photo_name = $this->generateRandomString().'.'.$profile_photo->getClientOriginalExtension();
            
            $destinationPath = public_path('assets/dashboard/profile/propic');
            
            if($profile_photo->move($destinationPath, $profile_photo_name)){
                $user->update(['propic'=>$profile_photo_name]);
            }else{
                $msg = ['Error','There was an error on uploading your profile photo !','error'];
                return redirect()->route('member.profile')->with(['msg'=>$msg]);
            }
        }

    	if($user->update([
    		'email'      => $request['email'],
            'family_office_name' => $request['family_office_name'],
            'fName'      => $request['fName'],
            'lName'      => $request['lName'],
            'title'      => $request['title'],
            'addr_1'     => $request['addr_1'],
            'addr_2'     => $request['addr_2'] ? $request['addr_2']:'',
            'town_city'  => $request['town_city'],
            'state'      => $request['state'],
            'postal_code'=> $request['postal_code'],
            'country'    => $request['country']?$request['country']:$user['country'],
            'phone_office' => $request['phone_office'],
            'phone_mobile' => $request['phone_mobile'],
            'dob'        => $request['dob']
        ])){
    		$msg = ['Success','Successfully Updated Profile!','success'];
        }else{
        	$msg = ['Error','There was an error, Please retry later~','error'];
        }
    	
    	return redirect()->route('member.profile')->with(['msg'=>$msg]);
    }

    public function editinvestmentobjective(Request $request)
    {
        $user = Auth::user();

        if(isset($request['private_investment_number'])){
            $user->update([
                'private_investment_number' => $request['private_investment_number']
            ]);
        }

        if(isset($request['additional_capacity'])){
            $user->update([
                'additional_capacity' => $request['additional_capacity']
            ]);
        }

        

        if(isset($request['invest_structure'])){
            $existing_record = MemberInvestmentStructure::where('member_id',$user->id)->get();

            if($existing_record->count()>0)
                foreach($existing_record as $e_r){
                    $e_r->delete();
                }
            foreach ($request['invest_structure'] as $is) {
                $record_is = MemberInvestmentStructure::create([
                    'member_id' => $user->id,
                    'type_id' => $is
                ]);
            }
        }

        if(isset($request['invest_region'])){
            $existing_record = MemberInvestmentRegion::where('member_id',$user->id)->get();
            if($existing_record->count()>0)
                foreach($existing_record as $e_r){
                    $e_r->delete();
                }
            foreach ($request['invest_region'] as $ir) {
                $record_is = MemberInvestmentRegion::create([
                    'member_id' => $user->id,
                    'type_id' => $ir
                ]);
            }
        }
            

        if(isset($request['average_investment_size'])){
            $existing_record = MemberInvestmentSize::where('member_id',$user->id)->get();
            if($existing_record->count()>0)
                foreach($existing_record as $e_r){
                    $e_r->delete();
                }
            foreach ($request['average_investment_size'] as $ais) {
                $record_is = MemberInvestmentSize::create([
                    'member_id' => $user->id,
                    'type_id' => $ais
                ]);
            }
        }
            

        if(isset($request['investment_stage'])){
            $existing_record = MemberInvestmentStage::where('member_id',$user->id)->get();
            if($existing_record->count()>0)
                foreach($existing_record as $e_r){
                    $e_r->delete();
                }

            foreach ($request['investment_stage'] as $ist) {
                $record_is = MemberInvestmentStage::create([
                    'member_id' => $user->id,
                    'type_id' => $ist
                ]);
            }
        }

        if(isset($request['investment_sector'])){
            $existing_record = MemberInvestmentSector::where('member_id',$user->id)->get();
            if($existing_record->count()>0)
                foreach($existing_record as $e_r){
                    $e_r->delete();
                }
                
            foreach ($request['investment_sector'] as $isr) {
                $record_is = MemberInvestmentSector::create([
                    'member_id' => $user->id,
                    'type_id' => $isr
                ]);
            }
        }

        $mofs = MemberRequestOpportunity::where('is_accepted', 1)->where('is_submitted', 1)->get();
        foreach($mofs as $mof)
            $this->checkmatch($mof,$user);

        $niqs = InvestmentQuestionnaire::where('is_allowed', 1)->get();
        foreach($niqs as $niq)
            $this->checkmatchAlgo($niq, $user);

        $msds = MemberSimpleOpportunity::where('is_allowed', 1)->get();
        foreach($msds as $msd)
            $this->checkmatchAlgoSimple($msd, $user);

        $msg = ['Success','Successfully Updated Profile!','success'];
        return redirect()->route('member.profile')->with(['msg'=>$msg]);
    }

    public function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function checkmatch(MemberRequestOpportunity $mof, User $new_user)
    {
        if($mof){
            $score = 0;

            $state = $mof->investment_region;
            $sector = $mof->investment_sector;
            $stage = $mof->company_stage;
            $structure = $mof->investment_structure;
            $size = $mof->valuation;

            $score_structure = 0;
            $score_stage = 0;
            $score_state = 0;
            $score_sector = 0;
            $score_size = 0;

            if($new_user->investmentstructure){
                foreach($new_user->investmentstructure as $is){
                    if($structure == $is->type_id)
                        $score_structure = 1;
                }
            }

            if($new_user->investmentstage){
                foreach($new_user->investmentstage as $is){
                    if($is->type_id > 2 && $stage == 3) 
                        $score_stage = 1;
                    if($is->type_id <= 2 && $stage == $is->type_id)
                        $score_stage = 1;
                }
            }

            if($new_user->investmentregion){
                foreach($new_user->investmentregion as $is){
                    if($state == $is->type_id)
                        $score_state = 1;
                }
            }

            if($new_user->investmentsector){
                foreach($new_user->investmentsector as $is){
                    if($sector == $is->type_id)
                        $score_sector = 1;
                }
            }


            if($new_user->investmentsize){
                foreach($new_user->investmentsize as $is){
                    if($is->type_id == 1 && $size < 5 * pow(10,5)){
                        $score_size = 1;
                    }elseif($is->type_id == 2 && $size >= 5 * pow(10,5) && $size <= pow(10,6)){
                        $score_size = 1;
                    }elseif($is->type_id == 3 && $size >= pow(10,6) && $size <= 5 * pow(10,6)){
                        $score_size = 1;
                    }elseif($is->type_id == 4 && $size >= 5 * pow(10,6) && $size <= pow(10,7)){
                        $score_size = 1;
                    }elseif($is->type_id == 5 && $size >= pow(10,7)){
                        $score_size = 1;
                    }
                }
            }

            $oppor_id = MemberOpportunityForm::where('code', $mof->code)->first()->id;

            $score = ($score_structure + $score_stage + $score_state + $score_sector + $score_size) * 20;
            $match_member_oppor = MemberOpportunityMatch::where('opportunity_id',$oppor_id)->where('matched_member_id',$new_user->id)->first();
            if($match_member_oppor){
                $match_member_oppor->update([
                    'score' => $score,
                    'matched_structure' => $score_structure,
                    'matched_stage' => $score_stage,
                    'matched_state' => $score_state,
                    'matched_sector' => $score_sector,
                    'matched_size' => $score_size
                ]);
            }else{
                $match_member_oppor = MemberOpportunityMatch::create([
                    'opportunity_id' => $oppor_id,
                    'matched_member_id' => $new_user->id,
                    'score' => $score,
                    'matched_structure' => $score_structure,
                    'matched_stage' => $score_stage,
                    'matched_state' => $score_state,
                    'matched_sector' => $score_sector,
                    'matched_size' => $score_size
                ]);
            }
        }
    }

    public function checkmatchAlgo(InvestmentQuestionnaire $mof, User $new_user)
    {
        if($mof){
            $score = 0;

            $state = $mof->state;
            $sector = $mof->sector;
            $stage = $mof->company_stage;
            $structure = $mof->current_capital_raise_structure;
            $size = $mof->investment_size;

            $score_structure = 0;
            $score_stage = 0;
            $score_state = 0;
            $score_sector = 0;
            $score_size = 0;

            if($new_user->investmentstructure){
                foreach($new_user->investmentstructure as $is){
                    if($structure == $is->type_id)
                        $score_structure = 1;
                }
            }

            if($new_user->investmentstage){
                foreach($new_user->investmentstage as $is){
                    if($is->type_id > 2 && $stage == 3) 
                        $score_stage = 1;
                    if($is->type_id <= 2 && $stage == $is->type_id)
                        $score_stage = 1;
                }
            }

            if($new_user->investmentregion){
                foreach($new_user->investmentregion as $is){
                    if($state == $is->type_id)
                        $score_state = 1;
                }
            }

            if($new_user->investmentsector){
                foreach($new_user->investmentsector as $is){
                    if($sector == $is->type_id)
                        $score_sector = 1;
                }
            }


            if($new_user->investmentsize){
                foreach($new_user->investmentsize as $is){
                    if($is->type_id == 1 && $size < 5 * pow(10,5)){
                        $score_size = 1;
                    }elseif($is->type_id == 2 && $size >= 5 * pow(10,5) && $size <= pow(10,6)){
                        $score_size = 1;
                    }elseif($is->type_id == 3 && $size >= pow(10,6) && $size <= 5 * pow(10,6)){
                        $score_size = 1;
                    }elseif($is->type_id == 4 && $size >= 5 * pow(10,6) && $size <= pow(10,7)){
                        $score_size = 1;
                    }elseif($is->type_id == 5 && $size >= pow(10,7)){
                        $score_size = 1;
                    }
                }
            }


            $score = ($score_structure + $score_stage + $score_state + $score_sector + $score_size) * 20;
            $match_member_oppor = MemberDealMatch::where('opportunity_id',$mof->id)->where('matched_member_id',$new_user->id)->first();
            if($match_member_oppor){
                $match_member_oppor->update([
                    'score' => $score,
                    'matched_structure' => $score_structure,
                    'matched_stage' => $score_stage,
                    'matched_state' => $score_state,
                    'matched_sector' => $score_sector,
                    'matched_size' => $score_size
                ]);
            }else{
                $match_member_oppor = MemberDealMatch::create([
                    'opportunity_id' => $mof->id,
                    'matched_member_id' => $new_user->id,
                    'score' => $score,
                    'matched_structure' => $score_structure,
                    'matched_stage' => $score_stage,
                    'matched_state' => $score_state,
                    'matched_sector' => $score_sector,
                    'matched_size' => $score_size
                ]);
            }
        }
    }

    public function checkmatchAlgoSimple(MemberSimpleOpportunity $mof, User $new_user)
    {
        if($mof){
            $score = 0;

            $state = $mof->investment_region;
            $sector = $mof->investment_sector;
            $stage = $mof->company_stage;
            $structure = $mof->current_capital_raise_structure;
            $size = $mof->investment_size;

            $score_structure = 0;
            $score_stage = 0;
            $score_state = 0;
            $score_sector = 0;
            $score_size = 0;

            if($new_user->investmentstructure){
                foreach($new_user->investmentstructure as $is){
                    if($structure == $is->type_id)
                        $score_structure = 1;
                }
            }

            if($new_user->investmentstage){
                foreach($new_user->investmentstage as $is){
                    if($is->type_id > 2 && $stage == 3) 
                        $score_stage = 1;
                    if($is->type_id <= 2 && $stage == $is->type_id)
                        $score_stage = 1;
                }
            }

            if($new_user->investmentregion){
                foreach($new_user->investmentregion as $is){
                    if($state == $is->type_id)
                        $score_state = 1;
                }
            }

            if($new_user->investmentsector){
                foreach($new_user->investmentsector as $is){
                    if($sector == $is->type_id)
                        $score_sector = 1;
                }
            }


            if($new_user->investmentsize){
                foreach($new_user->investmentsize as $is){
                    if($is->type_id == 1 && $size < 5 * pow(10,5)){
                        $score_size = 1;
                    }elseif($is->type_id == 2 && $size >= 5 * pow(10,5) && $size <= pow(10,6)){
                        $score_size = 1;
                    }elseif($is->type_id == 3 && $size >= pow(10,6) && $size <= 5 * pow(10,6)){
                        $score_size = 1;
                    }elseif($is->type_id == 4 && $size >= 5 * pow(10,6) && $size <= pow(10,7)){
                        $score_size = 1;
                    }elseif($is->type_id == 5 && $size >= pow(10,7)){
                        $score_size = 1;
                    }
                }
            }


            $score = ($score_structure + $score_stage + $score_state + $score_sector + $score_size) * 20;
            $match_member_oppor = MemberSimpleOpportunityMatch::where('opportunity_id',$mof->id)->where('matched_member_id',$new_user->id)->first();
            if($match_member_oppor){
                $match_member_oppor->update([
                    'score' => $score,
                    'matched_structure' => $score_structure,
                    'matched_stage' => $score_stage,
                    'matched_state' => $score_state,
                    'matched_sector' => $score_sector,
                    'matched_size' => $score_size
                ]);
            }else{
                $match_member_oppor = MemberSimpleOpportunityMatch::create([
                    'opportunity_id' => $mof->id,
                    'matched_member_id' => $new_user->id,
                    'score' => $score,
                    'matched_structure' => $score_structure,
                    'matched_stage' => $score_stage,
                    'matched_state' => $score_state,
                    'matched_sector' => $score_sector,
                    'matched_size' => $score_size
                ]);
            }
        }
    }
}
