<?php

namespace App\Http\Controllers;

class PublicController extends Controller
{
    public function serviceStatus()
    {
        return view('servicestatus');
    }
}
