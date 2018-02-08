<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use View;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');

        // $countryArray = array('Canada', 'United States', 'Serbia');
        // return view('auth/register')->with('name', 'Victoria');
        // return view('auth/register')->with('name', 'Victoria');
        // return view('auth/register', ['countryArray' => $countryArray]);
        // return View::make("auth/register")->with(array('countryArray'=>$countryArray));
    }


    public function showRegistrationForm()
    {
        return view('auth.register')->with('countries', ['Canada', 'United States', 'Serbia']);
    }

    /** 
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
            

    protected function validator(array $data)
    {
        $countriesArray = array('Canada', 'United States', 'Serbia');

        // $this->allslots=array('Canada', 'United States', 'Serbia');

        $messages = [
            'in_array' => 'You must choose existing value',
        ];  

        return Validator::make($data, [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'company' => 'required',
            'country' => [
                'required',
                Rule::in($countriesArray)
            ],
            // 'country' => 'required|in:' . implode(glue, pieces)(',', $this->allslots),
            'password' => 'required',
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'company' => $data['company'],
            'country' => $data['country'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
