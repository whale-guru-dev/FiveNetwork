<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin;
use Auth;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class StaffController extends Controller
{
	protected $hasher;

    public function __construct(HasherContract $hasher)
    {
        $this->middleware('auth:admin');
        $this->hasher = $hasher;
    }

    public function staffmanageview()
    {
    	$admins = Admin::all();
    	return view('pages.admin.staffmanageview')->with(['admins' => $admins]);
    }

    public function newstaff(Request $request)
    {
        
    	$fName = $request['fName'];
    	$lName = $request['lName'];
    	$email = $request['email'];
    	$username = $request['username'];
    	$password = $request['password'];
    	$conf_password = $request['conf_password'];
    	$role = $request['role'];

        if(Admin::where('username', $username)->first()){
            $msg = ['Error', 'This username is already taken.', 'error'];
            return redirect()->route('admin.staff-management')->with(['msg' => $msg]);
        }

        if(Admin::where('email', $email)->first()){
            $msg = ['Error', 'This email is already taken.', 'error'];
            return redirect()->route('admin.staff-management')->with(['msg' => $msg]);
        }

    	if($password == $conf_password){
    		$admin = Admin::create([
    			'fName' => $fName,
    			'lName' => $lName,
    			'username' => $username,
    			'email' => $email,
    			'role'  => $role,
    			'password' => bcrypt($password)
    		]);

    		$msg = ['Success', 'Successfully create new staff account', 'success'];
    		return redirect()->route('admin.staff-management')->with(['msg' => $msg]);
    	}else{
    		$msg = ['Error', 'Initial Password should be confirmed', 'error'];
    		return redirect()->route('admin.staff-management')->with(['msg' => $msg]);
    	}

    }

    public function editadminstaff(Request $request)
    {
    	$id = $request['id'];
    	$admin = Admin::find($id);
    	$fName = $request['fName'];
    	$lName = $request['lName'];
    	$email = $request['email'];
    	$username = $request['username'];
    	$role = $request['role'];

		$admin = $admin->update([
			'fName' => $fName?$fName:$admin->fName,
			'lName' => $lName?$lName:$admin->lName,
			'username' => $username?$username:$admin->username,
			'email' => $email?$email:$admin->email,
			'role'  => $role?$role:$admin->role
		]);

		$msg = ['Success', 'Successfully Editted Account Information', 'success'];
    		
    	

		return redirect()->route('admin.staff-management')->with(['msg' => $msg]);

    }

    public function delstaff(Request $request)
    {
    	$id = $request['id'];
    	$admin = Admin::find($id);
    	$admin->delete();
    	$msg = ['Success', 'Successfully Deleted a staff account', 'success'];
    	return redirect()->route('admin.staff-management')->with(['msg' => $msg]);
    }

    public function staffaccountview()
    {
    	$admin = Auth::guard('admin')->user();
    	return view('pages.admin.staffaccountview')->with(['admin' => $admin]);
    }

    public function editstaffaccount(Request $request)
    {
    	$admin = Auth::guard('admin')->user();
    	$fName = $request['fName'];
    	$lName = $request['lName'];
    	$email = $request['email'];
    	$username = $request['username'];
    	$password = $request['password'];
    	$cur_password = $request['cur_password'];
    	$conf_password = $request['conf_password'];
    	$role = $request['role'];

    	if($password != null){
    		if($password == $conf_password){
    			if($this->hasher->check($cur_password, $admin->getAuthPassword())){
    				$admin->update(['password'=>bcrypt($request['password'])]);
    			}else{
    				$msg = ['Error','You input wrong original password !','error'];
    				return redirect()->route('admin.staff-account')->with(['msg'=>$msg]);
    			}
    		}else{
				$msg = ['Error','Your confirmation password should be matched with your new password !','error'];
				return redirect()->route('admin.staff-account')->with(['msg'=>$msg]);
    		}
    	}

    	if($request->hasFile('profile_photo')){
            
            $profile_photo = $request->file('profile_photo');

            $profile_photo_name = $this->generateRandomString().'.'.$profile_photo->getClientOriginalExtension();
            
            $destinationPath = public_path('assets/dashboard/profile/propic');
            
            if($profile_photo->move($destinationPath, $profile_photo_name)){
                $admin->update(['propic'=>$profile_photo_name]);
            }else{
                $msg = ['Error','There was an error on uploading your profile photo !','error'];
                return redirect()->route('admin.staff-account')->with(['msg'=>$msg]);
            }
        }

    	if($password == $conf_password){
    		$admin = $admin->update([
    			'fName' => $fName?$fName:$admin->fName,
    			'lName' => $lName?$lName:$admin->lName,
    			'username' => $username?$username:$admin->username,
    			'email' => $email?$email:$admin->email,
    			'role'  => $role?$role:$admin->role
    		]);

    		$msg = ['Success', 'Successfully Editted Account Information', 'success'];
    		
    	}else{
    		$msg = ['Error', 'Initial Password should be confirmed', 'error'];
    		
    	}

		return redirect()->route('admin.staff-account')->with(['msg' => $msg]);

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
