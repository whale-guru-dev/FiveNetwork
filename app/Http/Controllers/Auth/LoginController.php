<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\User;
use App\Model\MemberLogin;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/member';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        $this->validateLogin($request);

        $user = User::where('email',$request['email'])->first();
        
        if ($user && $user->is_allowed == 1) {
            // If the class is using the ThrottlesLogins trait, we can automatically throttle
            // the login attempts for this application. We'll key this by the username and
            // the IP address of the client making these requests into this application.
            if ($this->hasTooManyLoginAttempts($request)) {
                $this->fireLockoutEvent($request);

                return $this->sendLockoutResponse($request);
            }

            if ($this->attemptLogin($request)) {
                
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
                $long = $this->ip_info_longlat($ip,"longitude");
                $lat = $this->ip_info_longlat($ip,"latitude");
                
                $busa = $this->ip_info_country_code($ip) == 'US' ? 1 :0;

                if($busa == 1) {
                    $code = 'US-'.$this->ip_info_region_code($ip);
                }else{
                    $code = $this->ip_info_region_code($ip);
                }

                $loc = "$ca";

                $logins = MemberLogin::create([
                    'usid' => $user->id,
                    'ip_addr' => $ip,
                    'location' => $loc,
                    'device' => $device_details,
                    'is_active' => 1,
                    'long' => $long,
                    'lat'  => $lat,
                    'code' => $code,
                    'is_usa' => $busa
                ]);
                return redirect()->route('member.dashboard');
                // return $this->sendLoginResponse($request);
            }

            // If the login attempt was unsuccessful we will increment the number of attempts
            // to login and redirect the user back to the login form. Of course, when this
            // user surpasses their maximum number of attempts they will get locked out.
            $this->incrementLoginAttempts($request);

            return $this->sendFailedLoginResponse($request);
        }elseif($user && $user->is_allowed != 3){
            return $this->sendFailedLoginResponseNotAllowed($request);
        }elseif($user && $user->is_allowed == 3){
            return $this->sendFailedLoginResponseRemoved($request);
        }else{
            $this->incrementLoginAttempts($request);

            return $this->sendFailedLoginResponse($request);
        }

    }

    public function sendFailedLoginResponseNotAllowed(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => ['You are not allowed as a member'],
        ]);
    }

    public function sendFailedLoginResponseRemoved(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => ['You were removed from this platform'],
        ]);
    }

    public function logout(Request $request)
    {
        $login_info = MemberLogin::where('usid',Auth::user()->id)->where('is_active',1)->get();
        foreach($login_info as $li)
            $li->update(['is_active'=>0]);
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect()->route('login');
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

    public function ip_info_region_code($ip = NULL)
    {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));

        return $ipdat->geoplugin_regionCode;
    }

    public function ip_info_country_code($ip = NULL)
    {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        return $ipdat->geoplugin_countryCode;
    }

    public function ip_info_longlat($ip = NULL, $purpose) {
        
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));

        switch ($purpose) {
            
            case "longitude":
                $output = $ipdat->geoplugin_longitude;
                break;
            case "latitude":
                $output = $ipdat->geoplugin_latitude;
                break;
        }

        return $output;
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
                    // case "city":
                    //     $output = @$ipdat->geoplugin_city;
                    //     break;
                    // case "state":
                    //     $output = @$ipdat->geoplugin_regionName;
                    //     break;
                    // case "region":
                    //     $output = @$ipdat->geoplugin_regionName;
                    //     break;
                    // case "country":
                    //     $output = @$ipdat->geoplugin_countryName;
                    //     break;
                    // case "countrycode":
                    //     $output = @$ipdat->geoplugin_countryCode;
                    //     break;
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
