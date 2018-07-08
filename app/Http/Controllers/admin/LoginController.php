<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Model\Admin;
use Session;
use App\Model\AdminLogin;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    public function __construct()
    {
      // $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
      return view('auth.admin-login');
    }

    public function login(Request $request)
    {

      // Validate the form data
      $this->validate($request, [
        'username' => 'required',
        'password' => 'required|min:6'
      ]);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {

            $user_os        =   $this->getOS();
            $user_browser   =   $this->getBrowser();

            $device_details =   "".$user_browser." on ".$user_os."";
            // $ip = $_SERVER['REMOTE_ADDR'];
            $ip = $this->getRealIpAddr(); 
            $ua = $_SERVER['HTTP_USER_AGENT'];

            // $ccity = $this->ip_info("Visitor","city");
            // $cstate = $this->ip_info("Visitor","state");
            // $cregion = $this->ip_info("Visitor","region");
            // $co = $this->ip_info("Visitor", "country"); // India
            // $cc = $this->ip_info("Visitor", "countrycode"); // IN
            $ca = $this->ip_info("Visitor", "address"); // Proddatur, Andhra Pradesh, India

            $loc = "$ca";

            $login = AdminLogin::create([
                'admin_id' => Auth::guard('admin')->user()->id,
                'ip_addr' => $ip,
                'location' => $loc,
                'device' => $device_details,
                'is_active' => 1
            ]);
          // $admin = Admin::where('username',$request->username)->first();
          // if successful, then redirect to their intended location
        return redirect()->route('admin.dashboard');
          // return $this->sendLoginResponse($request);
        }
        // if unsuccessful, then redirect back to the login with the form data
        // return redirect()->back()->withInput($request->only('username', 'remember'));
        $this->incrementLoginAttempts($request);
     
        return $this->sendFailedLoginResponse($request);
      
    }

    public function username()
    {
        return 'username';
    }


    public function logout(Request $request)
    {

        if(AdminLogin::where('admin_id',Auth::guard('admin')->user()->id)->get()->count()>0)
        {
            $login_info = AdminLogin::where('admin_id',Auth::guard('admin')->user()->id)->where('is_active',1)->get();
            if($login_info->count()>0)
            foreach($login_info as $li)
                $li->update(['is_active'=>0]);
        }
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->guest(route( 'admin.login' ));
    }

        public function getOS() { 

        global $user_agent;

        $os_platform    =   "Unknown OS Platform";
        
        $user_agent     =   $_SERVER['HTTP_USER_AGENT'];

        $os_array       =   array(
                                '/windows nt 10/i'     =>  'Windows 10',
                                '/windows nt 6.3/i'     =>  'Windows 8.1',
                                '/windows nt 6.2/i'     =>  'Windows 8',
                                '/windows nt 6.1/i'     =>  'Windows 7',
                                '/windows nt 6.0/i'     =>  'Windows Vista',
                                '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                                '/windows nt 5.1/i'     =>  'Windows XP',
                                '/windows xp/i'         =>  'Windows XP',
                                '/windows nt 5.0/i'     =>  'Windows 2000',
                                '/windows me/i'         =>  'Windows ME',
                                '/win98/i'              =>  'Windows 98',
                                '/win95/i'              =>  'Windows 95',
                                '/win16/i'              =>  'Windows 3.11',
                                '/macintosh|mac os x/i' =>  'Mac OS X',
                                '/mac_powerpc/i'        =>  'Mac OS 9',
                                '/linux/i'              =>  'Linux',
                                '/ubuntu/i'             =>  'Ubuntu',
                                '/iphone/i'             =>  'iPhone',
                                '/ipod/i'               =>  'iPod',
                                '/ipad/i'               =>  'iPad',
                                '/android/i'            =>  'Android',
                                '/blackberry/i'         =>  'BlackBerry',
                                '/webos/i'              =>  'Mobile'
                            );

        foreach ($os_array as $regex => $value) { 

            if (preg_match($regex, $user_agent)) {
                $os_platform    =   $value;
            }

        }   

        return $os_platform;

    }


    public function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
        $output = NULL;
        if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if ($deep_detect) {
                if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
        }
        $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
        $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
        $continents = array(
            "AF" => "Africa",
            "AN" => "Antarctica",
            "AS" => "Asia",
            "EU" => "Europe",
            "OC" => "Australia (Oceania)",
            "NA" => "North America",
            "SA" => "South America"
        );
        if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));

            if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                switch ($purpose) {
                    case "location":
                        $output = array(
                            "city"           => @$ipdat->geoplugin_city,
                            "state"          => @$ipdat->geoplugin_regionName,
                            "country"        => @$ipdat->geoplugin_countryName,
                            "country_code"   => @$ipdat->geoplugin_countryCode,
                            "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                            "continent_code" => @$ipdat->geoplugin_continentCode,
                            "longitude"      => @$ipdat->geoplugin_longitude,
                            "latitude"       => @$ipdat->geoplugin_latitude
                        );
                        break;
                    case "address":
                        $address = array($ipdat->geoplugin_countryName);
                        if (@strlen($ipdat->geoplugin_regionName) >= 1)
                            $address[] = $ipdat->geoplugin_regionName;
                        if (@strlen($ipdat->geoplugin_city) >= 1)
                            $address[] = $ipdat->geoplugin_city;
                        $output = implode(", ", array_reverse($address));
                        break;
                    case "longitude":
                        $output = $ipdat->geoplugin_longitude;
                        break;
                    case "latitude":
                        $output = $ipdat->geoplugin_latitude;
                        break;
                }
            }
        }
        return $output;
    }

    public function getBrowser() {

        global $user_agent;

        $browser        =   "Unknown Browser";

        $browser_array  =   array(
                                '/msie/i'       =>  'Internet Explorer',
                                '/firefox/i'    =>  'Firefox',
                                '/safari/i'     =>  'Safari',
                                '/chrome/i'     =>  'Chrome',
                                '/edge/i'       =>  'Edge',
                                '/opera/i'      =>  'Opera',
                                '/netscape/i'   =>  'Netscape',
                                '/maxthon/i'    =>  'Maxthon',
                                '/konqueror/i'  =>  'Konqueror',
                                '/mobile/i'     =>  'Handheld Browser'
                            );

        foreach ($browser_array as $regex => $value) { 

            if (preg_match($regex, $user_agent)) {
                $browser    =   $value;
            }

        }

        return $browser;

    }

    public function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
          $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
          $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
          $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}
