<?php

namespace App\Http\Controllers;

use App\Http\Requests\Member\User\CreateRequest as MemberUserCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemberLoginController extends Controller
{
	public function authenticate($memberDir, Request $request)
	{
		$credentials = [
			'email' => $request->input('email'),
			'password' => $request->input('password'),
			'url' => $memberDir,
		];

		DB::enableQueryLog();

		if (Auth::guard('member')->attempt($credentials)) {

			\Log::debug(__LINE__ . ' ' . __METHOD__ . ' login success');
			$request->session()->regenerate();

			return redirect()->route('member.top', ['member_dir' => $memberDir])->with([
				'login_message' => 'ログインしました。',
			]);
		}

		$logs = DB::getQueryLog();

//		\Log::debug(__LINE__ . ' ' . __METHOD__ . ' [logs] ' . print_r($logs, true));
//		\Log::debug(__LINE__ . ' ' . __METHOD__ . ' [member_dir] ' . $memberDir);

		return back()->withErrors([
			'login' => 'Member ログインに失敗しました。',
		]);
	}

	public function login($url)
	{
		$params = [
			'url' => $url,
		];
		return view('member.login', $params);
	}

	public function logout()
	{
		// ログアウト処理は後ほど
	}
}

