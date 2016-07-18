<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class Test extends Controller
{
    public function index(){
        $cache = \App\Commons\Cache\Test::getInstance();
        $cache->cache(100);
        return view('test.index');
    }
}