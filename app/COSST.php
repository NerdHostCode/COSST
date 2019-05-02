<?php

namespace App;

class COSST
{
    public static function portCheck($ip, $port)
    {
        $fp = @fsockopen($ip, $port, $errno, $errstr, 5);
        if (!$fp) {
            return false;
        } else {
            fclose($fp);

            return true;
        }
    }
}
