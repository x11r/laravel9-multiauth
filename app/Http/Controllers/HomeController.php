<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function menu()
	{
		$members = Member::orderBy('created_at', 'desc')->orderBy('id')->get();

		$params = [
			'members' => $members,
		];

		return view('menu.index', $params);
	}
}
