<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AfterRegisterController extends Controller
{
    public function index()
    {
        return view('afterregister');
    }
}
