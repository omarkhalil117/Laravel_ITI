<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class student extends Controller
{
    //
    function home() {
        return view('student',[$data=>'omar']);
    }
}
