<?php
/**
 * Created by PhpStorm.
 * User: KOIGIANG
 * Date: 7/13/2016
 * Time: 9:41 PM
 */

namespace App\Commons\Cache;

use App\Commons\Adapter\Cache;

class Base extends Cache
{
    protected function __construct(array $config)
    {
        $config['type'] = config('cache.default');
        parent::__construct($config);
    }

}