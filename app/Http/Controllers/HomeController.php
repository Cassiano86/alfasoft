<?php

namespace App\Http\Controllers;

use App\Models\modelContatos;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',['contatos' => modelContatos::paginate(10)]);
    }
}
