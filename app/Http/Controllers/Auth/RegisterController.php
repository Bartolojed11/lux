<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Auth\Storage;

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
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'fname' => 'required|string|max:25',
            'mname' => 'required|string|max:25',
            'lname' => 'required|string|max:25',
            'contact_no' => 'required|string|max:11',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'pid' => 'required',
            'cid' => 'required'
        ]);
    }

    protected function create(array $data)
    {
        $image = $data['profile_picture'];
        $ext = $image->getClientOriginalExtension();
        $file_name = $image->getClientOriginalName();
        $file_storage = time() .'_'. pathinfo($file_name, PATHINFO_FILENAME) . '.' . $ext;
        $image->move('public/storage/profiles', $file_storage);
        // $path = file($file_name)->storeAs('public/profiles', $file_storage);

        return User::create([
            'profile_picture' => $file_storage,
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'mname' => $data['mname'],
            'contact_no' => $data['contact_no'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'pid' => $data['pid'],
            'cid' => $data['cid']
        ]);
    }
}