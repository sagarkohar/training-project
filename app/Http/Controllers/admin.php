<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class admin extends Controller
{
    function adminHome()
    {
        return view("admin.admin_home");
    }
}