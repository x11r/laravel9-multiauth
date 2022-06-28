<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserLoginController extends Controller
{
	public function authenticate(Request $request)
	{
		$crededntials = [
			'email' => $request->input('email'),
			'password' => $request->input('password'),
		];
		DB::enableQueryLog();

		if (Auth::guard('user')->attempt($crededntials)) {
			\Log::debug(__LINE__ . ' ' . __METHOD__ . ' login success');

			$request->session()->regenerate();

			return redirect()->route('user.top')->with([
				'login_message' => 'User ログインしました。',
			]);
		}

		$logs = DB::getQueryLog();

		\Log::debug(__LINE__ . ' ' . __METHOD__ . ' [logs] ' . print_r($logs, true));


		return back()->withErrors([
			'login' => 'Member ログインに失敗しました。',
		]);
	}

	public function login()
	{
		return view('user.login');
	}

	public function logout()
	{
		// ログアウト
	}
}
