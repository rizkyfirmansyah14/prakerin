<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {
        $siswas = \App\Siswa::all();
        return view('info-prakerin.index', compact('siswas'));
    }

}
