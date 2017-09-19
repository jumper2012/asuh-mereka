<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        $persebaran_anak_terlantar = DB::table('persebaran_anak_terlantar')->pluck('jumlah');

        return view('home', ['persebaran_anak' => $persebaran_anak_terlantar]);
    }
}
