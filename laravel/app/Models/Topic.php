<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    public static function timeAgo( $date )
    {
        date_default_timezone_set('Europe/Kiev');
        $time = strtotime($date);
        $time_difference = time() - $time;

        if( $time_difference < 1 ) { return 'меньше 1 секунди тому'; }
        $condition = array( 12 * 30 * 24 * 60 * 60 =>  'років',
            30 * 24 * 60 * 60       =>  'місяців',
            24 * 60 * 60            =>  'днів',
            60 * 60                 =>  'годин',
            60                      =>  'хвилин',
            1                       =>  'секунд'
        );

        foreach( $condition as $secs => $str )
        {
            $d = $time_difference / $secs;

            if( $d >= 1 )
            {
                $t = round( $d );
                return $t . ' ' . $str . ' тому';
            }
        }
    }
}
