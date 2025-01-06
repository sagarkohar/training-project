<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class firstController extends Controller
{
    //

    public function user()
    {
        return view('index');
    }
}