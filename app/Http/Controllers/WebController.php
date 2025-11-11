<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function produtos()
    {
        $produtos = DB::table('vw_produtos_com_precos')
            ->orderBy('prod_nome')
            ->paginate(20);
        
        return view('produtos', compact('produtos'));
    }
}