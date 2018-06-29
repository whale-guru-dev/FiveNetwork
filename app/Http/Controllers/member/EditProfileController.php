<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;

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

    public function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
