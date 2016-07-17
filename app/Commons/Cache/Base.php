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
    protected $type;
    protected function __construct(array $config)
    {
        $this->type = isset($config['type']) ?  $config['type'] : config('cache.default');
        $config['type'] = $this->type;
        parent::__construct($config);
    }
}