<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function serviceStatus()
    {
        return view('servicestatus');
    }
}
