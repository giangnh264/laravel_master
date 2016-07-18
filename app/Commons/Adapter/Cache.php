<?php

namespace App\Commons\Adapter;
class Cache
{
    protected $cache;
    private $expired_time = 15;
    private $cache_enable = 1;

    protected function __construct($config = []){
        if(empty($config['type']) || empty($config['redis_database'])){
            throw new \Exception('Redis params must be set');
        }
//        print_r($config);exit;
        $this->cache = \Illuminate\Support\Facades\Cache::store($config['type'] . '.' . $config['redis_database']);

        $this->cache_enable = env('REDIS_ENABLE', false);
    }

    /*
     * @return int
     */
    public function getExpiredTime(){
        return $this->expired_time;
    }

    /*
     * $params int $expired_time
     */
    public function setExpiredTime($expired_time){
        $this->expired_time = $expired_time;
    }

    public function has($key){
        if($this->cache_enable){
            if(!isset($key)){
                throw new \Exception('Params must be isset');
            }
            return $this->cache->has($key);
        }
        return false;
    }

    public function set($key, $value){
        if($this->cache_enable){
            if(!isset($key) || !isset($value)){
                throw new \Exception('Params must be isset');
            }
            return $this->cache->put($key, $value, $this->getExpiredTime());
        }
    }

}