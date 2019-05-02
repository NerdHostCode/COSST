<?php

namespace App\Http\Controllers;

use App\Servers;

class PublicController extends Controller
{
    public function serviceStatus()
    {
        $servers = Servers::where('hidden', '!=', '1')
            ->paginate(10);

        return view('servicestatus', compact('servers'));
    }
}
