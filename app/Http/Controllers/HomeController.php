<?php

namespace App\Http\Controllers;

use App\Temas;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

/**Models**/
use App\Opcoes;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $temasdetail = Temas::DetailTemas();

        return view('home', compact('temasdetail'));
    }
}
