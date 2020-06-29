<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transformers\UserTransformer;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function users(User $users)
    {
        $users = $users->all();
        return fractal()
        ->Collection($users)
        ->transformWith(new UserTransformer)
        ->toArray();
    }


    public function register (request $request, User $users)
    {
       $this->validate($request,[
           'name'=>'required',
           'email'=>'required',
           'password'=>'required',
            

       ]);
       
       $user = $users->create([
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=>bcrypt($request->password),
           'api_token'=>bcrypt($request->email),
       ]);

       $response = fractal()
       -> item($user)
       ->transformWith(new UserTransformer)
       ->toArray();

    return  response()->json($response,201);
      

    }

    public function login(Request $request, User $users)
    {
        if(!Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            return response()->json(['error'=>'daftar tidak masuk', 401]);
        }

        $user = $users->find(Auth::user()->id);

       

        return fractal()
        ->item($user)
        ->transformWith(new UserTransformer)
        ->addMeta([
            'token'=>$user->api_token,
        ])
        ->toArray();

    }

    public function profile(User $user)
    {
       

           
         
        
        $user = $user->find(Auth::user()->id);
        return fractal()
        ->item($user)
        ->transformWith(new UserTransformer)
        ->toArray();

        
        
    }
}
