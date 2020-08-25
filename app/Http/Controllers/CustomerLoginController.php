<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Customer;
use Socialite;

class CustomerLoginController extends Controller
{
    protected function guard()
    {
        return Auth::guard('customer');
    }

    protected $redirectTo = 'customer-profile';


    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

   

    /*******************/
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    public function handleProviderCallback($provider)
    {

        try {
            $getInfo = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect('/');
        }

        $user = $this->findOrCreateUser($getInfo, $provider);
        $this->guard()->login($user, true);
        return redirect($this->redirectTo);
    }
    public function findOrCreateUser($getInfo, $provider)
    {
        $user = Customer::where('provider_id', $getInfo->id)->first();
 
         if (!$user) {
             $user = Customer::create([
                'name'     => $getInfo->name,
                'email'    => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id
            ]);
          }
          return $user;
    }
    /*******************/



    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect('customer-login');
    }


    protected function loggedOut(Request $request)
    {

    }
    
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
    }
}
