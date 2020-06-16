<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transformers\UserTransformer;

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
}
