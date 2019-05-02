<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servers extends Model
{
    public function services()
    {
        return $this->hasOne('\App\ServerConfiguration', 'serverid');
    }
}
