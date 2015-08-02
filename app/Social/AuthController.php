<?php namespace App\Social;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use App\Social\Traits\AuthenticatesAndRegistersUsers;
use App\Social\Models\User;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Sauth;

class AuthController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controllerblog/suscipit-molestiae-maiores-temporibus-aperiam
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, DispatchesCommands, ValidatesRequests;


    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth
     * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
     * @return void
     */
    public function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function accountIsActive($code) {
        $user = User::where('activation_code', '=', $code)->first();
        $user->active = 1;
        $user->activation_code = '';
        if($user->save()) {
            Sauth::loginUsingId($user->id);
        }

        return redirect(config('authenticator.login_redirect'));
    }

}
