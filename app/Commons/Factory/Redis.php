<?php
/**
 * Created by PhpStorm.
 * User: KOIGIANG
 * Date: 7/13/2016
 * Time: 9:47 PM
 */

namespace App\Commons\Factory;
use Illuminate\Support\Facades\Redis as LRedis;
use Predis\Client;

class Redis
{
    const BD_CLIP = 'clip';
    /**
     * @param $name
     * @return Client
     */
    public static function create($name)
    {
        return LRedis::connection($name);
    }
}