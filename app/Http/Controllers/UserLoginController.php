<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserLoginController extends Controller
{
	public function __construct()
	{
		//
	}

	public function login()
	{
		return view('user.login');
	}

	public function auth()
	{
		//
	}
}
