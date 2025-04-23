<?php

namespace App\Http\Controllers;

use joud;

use Illuminate\Http\Request;

class JoudController extends Controller
{
    public function index()
    {
        $joud = "JOUD";
        return view('joud', compact('joud'));
    }
}
