<?php

namespace App\Http\Controllers\Auth;

//use App\User;
//use Validator;
//use App\Http\Controllers\Controller;
//use App\Social;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
//use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\Controller;
//use App\Logic\User\UserRepository;
use Illuminate\Contracts\Auth\Guard;
use App\User;
use App\Social;
use App\Models\Role;
use Input, Validator, Auth;
use Laravel\Socialite\Facades\Socialite;
//use App\Traits\CaptchaTrait;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;
    protected $auth;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


 public function getSocialRedirect( $provider )
    {
        $providerKey = \Config::get('services.' . $provider);
        if(empty($providerKey))
            return view('pages.status')
                ->with('error','No such provider');
 
        return Socialite::driver( $provider )->redirect();
 
    }
 
    public function getSocialHandle( $provider )
    {
        $user = Socialite::driver( $provider )->user();
 
        $socialUser = null;
 
        //Check is this email present
        $userCheck = User::where('email', '=', $user->email)->first();
        if(!empty($userCheck))
        {
            $socialUser = $userCheck;
        }
        else
        {
            $sameSocialId = Social::where('social_id', '=', $user->id)->where('provider', '=', $provider )->first();
 
            if(empty($sameSocialId))
            {
                //There is no combination of this social id and provider, so create new one
                $newSocialUser = new User;
                $newSocialUser->email              = $user->email;
                $name = explode(' ', $user->name);
                $newSocialUser->first_name         = $name[0];
                $newSocialUser->last_name          = $name[1];
                $newSocialUser->save();
 
                $socialData = new Social;
                $socialData->social_id = $user->id;
                $socialData->provider= $provider;
                $newSocialUser->social()->save($socialData);
 
                // Add role
                $role = Role::whereName('user')->first();
                $newSocialUser->assignRole($role);
 
                $socialUser = $newSocialUser;
            }
            else
            {
                //Load this existing social user
                $socialUser = $sameSocialId->user;
            }
 
        }
 
        $this->auth->login($socialUser, true);
 
        if( $this->auth->user()->hasRole('user'))
        {
            return redirect()->route('user.home');
        }
 
        if( $this->auth->user()->hasRole('admin'))
        {
            return redirect()->route('admin');
        }
 
        return \App::abort(500);
    }
}
