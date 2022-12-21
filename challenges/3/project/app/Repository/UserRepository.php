<?php

namespace App\Repository;

use App\Models\User;

class UserRepository {
	public function createNewUser ( array $data ) {
		$user = new User();
		$user->fill($data);
		$user->save();
		
		return $user;
	}
}