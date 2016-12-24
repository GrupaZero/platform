<?php

namespace App\Http\Controllers\Auth;

use App\Jobs\SendWelcomeEmail;
use Gzero\Repository\UserRepository;
use Gzero\Validator\BaseUserValidator;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Gzero\Core\Controllers\BaseController;

class RegisterController extends BaseController {
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RedirectsUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @param UserRepository    $userRepo
     * @param BaseUserValidator $validator
     */
    public function __construct(UserRepository $userRepo, BaseUserValidator $validator)
    {
        $this->userRepo  = $userRepo;
        $this->validator = $validator;
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // Preventing spammer registration
        if ($request->input('account_intent')) {
            return redirect()->route('home');
        }

        $this->validator->setData($request->all());
        $input = $this->validator->validate('register');
        $user  = $this->userRepo->create($input);

        event(new Registered($user));

        $this->guard()->login($user);

        dispatch(new SendWelcomeEmail($user));

        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  mixed                    $user
     *
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //@TODO send welcome email
        session()->put('showWelcomePage', true);
        return redirect()->route('account.welcome', ['method' => 'Signup form']);
    }
}
