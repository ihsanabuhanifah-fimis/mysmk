<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Wali;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nisn' => ['required', 'string', 'min:8'],
            'username'=>['required', 'string', 'max:255', 'unique:users'],
            'tempat'=>['required'],
            'tanggal'=>['required','max:2'],
            'bulan'=>['required','max:2'],
            'tahun'=>['required','max:4'],
            'no-hp'=>['required','string','max:13'],
            'daftar-sebagai'=>['required','integer'],
            'secret-number'=>['string','nullable'],
            'nama_santri'=>['string','nullable'],

            [

                'unique ' =>  ':attribute sudah digunakan.',
                'required' => ':attribute wajib diisi.',
                'min' => ':attribute min : karater.',
            ]

            
        ]);

       

       
        
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
            'nisn' => $data['nisn'],
            'name' => $data['name'],
            'username' => $data['username'],
            'tanggal' => $data['tanggal'],
            'tempat' => $data['tempat'],
            'email' => $data['email'],
            'no_hp'=>$data['no-hp'],
            'daftar_sebagai'=>$data['daftar-sebagai'],
            'nama_santri'=>$data['nama_santri'],
            'bulan' =>$data['bulan'],
            'tahun' =>$data['tahun'],
            'secret_number'=>$data['secret-number'],
            'password' => Hash::make($data['password'])
            
           
        ]);
    }

      
    
}

