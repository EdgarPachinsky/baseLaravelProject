<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UniversalUpdater;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    private $updater;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->updater = new UniversalUpdater();
    }

    /**
     * Redirect the user to the facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $userFromFc = Socialite::driver('facebook')->user();
        $user = DB::table('users')->where('facebook_id','=',$userFromFc->id)->get();
        if(count($user) == 0){
            $user = new User();
            $dataArray = array();
            $dataArray['name'] = $userFromFc->name;
            if($userFromFc->email == null)
                $dataArray['email'] = (md5(uniqid(mt_rand(), true))).'@example.com';
            else
                $dataArray['email'] = $userFromFc->email;
            $dataArray['password'] = bcrypt(md5('159753456hopar7412581473hopar773344123456789hopar'));
            $dataArray['role_id'] = 2;
            $user->name = $dataArray['name'];
            $user->facebook_id = $userFromFc->id;
            $user->role_id = $dataArray['role_id'];
            $user->email = $dataArray['email'];
            $user->password = $dataArray['password'];
            $user->save();
            $userToLogin = DB::table('users')->where('email','=',$dataArray['email'])->get();
            Auth::loginUsingId($userToLogin[0]->id);
            return redirect('/');
        }else{
            Auth::loginUsingId($user[0]->id);
            return redirect('/');
        }
    }
}
