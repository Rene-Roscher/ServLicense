<?php


namespace App\Providers\Plocic;


use Plocic\Plocic;

class PlocicFacade
{

    public static function api()
    {
        return new Plocic(env('PLOCIC_AUTHTOKEN'));
    }

}
