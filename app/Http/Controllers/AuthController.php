<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request){
    	$name=$request->input('name');
    	$email=$request->input('email');
    	$password=Hash::make($request->input('password'));

    	$register=User::create([
    		'name'=>$name,
    		'email'=>$email,
    		'password'=>$password
    	]);
    	if($register){
    		return response()->json([
    			'success'=>true,
    			'message'=>'Register berhasil',
    			'data'=>$register,
    		],201);	
    	}else{
    		return response()->json([
    			'success'=>false,
    			'message'=>'Register fail',
    			
    		],400);    		
    	}
    	
    }
    public function login(Request $request){

    }
}
