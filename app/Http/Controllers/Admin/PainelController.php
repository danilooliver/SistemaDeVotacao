<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

/**Models**/
use App\Temas;
use Illuminate\Support\Facades\Auth;

class PainelController extends Controller
{
    public function index()
    {
      $temas = Temas::DetailTemasId(Auth::user()->id);

      return view('admin.painel', compact('temas'));

    }
}
