<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
	public function register ( RegisterRequest $request ) {
		try {
			$data = [
				'cellphone' => $request->get('cellphone') ,
				'name' => $request->get('name') ,
				'lastname' => $request->get('lastname') ,
				'password' => Hash::make($request->get('password')) ,
			];
			$user = resolve(UserRepository::class)->createNewUser($data);
			$user[ 'token' ] = $user->createToken('api-token')->plainTextToken;
			
			return response()->json([
										'user' => UserResource::make($user) ,
									]);
		}
		catch ( \Throwable $th ) {
			return response()->json([
										'status' => false ,
										'message' => $th->getMessage() ,
									] , 500);
		}
	}
	
	public function user ( Request $request ) {
		$user = $request->user();
		$user[ 'token' ] = $request->user()
								   ->currentAccessToken()->token;
		
		return response()->json([
									'user' => UserResource::make($user),
								]);
	}
}
