<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tasks']=Task::orderBy('id', 'desc')->limit(5)->get();
        $data['users']=User::orderBy('id', 'desc')->limit(5)->get();
        return view('home')->with('data', $data);
    }
}
