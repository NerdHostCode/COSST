<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WidgetController extends Controller
{
    protected

    public static function factory() {
        if (file_exists(ROOTDIR . '/.env')) {
            return true;
        }
        return false;
    }
}
