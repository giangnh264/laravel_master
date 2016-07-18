<?php
/**
 * Created by PhpStorm.
 * User: KOIGIANG
 * Date: 7/13/2016
 * Time: 9:45 PM
 */

namespace App\Commons\Cache;


use App\Commons\Factory\Redis;

class Test extends Base
{
    static $instance;
   public function __construct(array $config)
   {
       $config['redis_database'] = Redis::BD_TEST;
       parent::__construct($config);
   }

    public static function getInstance($config = []){
        if(!static::$instance){
            static::$instance = new static($config);
        }
        return static::$instance;
    }

    public function cache($id){
        $data = [
            'id'=>'100',
            'title'=>'test',
        ];
        $this->set($id, $data);
//        $cache->set($id, $data);
    }

}