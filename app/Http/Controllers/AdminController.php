<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(Request $request)
    {

        $all = $request->all();

        $admins = \DB::table('admins')->paginate(3);

        return view('admin.index', ['admins' => $admins]);
    }

    public function create(Request $request)
    {

        return view('admin.create');
    }

    public function store(Request $request)
    {
        //
        $all = $request->all();
        $files = $request->file();

        \Log::debug(__LINE__ . ' ' . __METHOD__);
        echo '<pre>'. print_r($all).'</pre>';
        echo '<pre>'. print_r($files).'</pre>';
    }
}
