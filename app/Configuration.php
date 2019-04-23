<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $table = 'configuration';

    public static function get(string $setting) {
        return self::where('setting', $setting)
            ->value('value');
    }
}
