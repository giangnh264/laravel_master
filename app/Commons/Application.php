<?php

namespace App\Commons;

use Illuminate\Support\Facades;

class Application
{
    /**
     *
     */
    const APP_DEFAULT = 'home';
    /**
     *
     */
    const APP_WEB = 'web';
    const APP_WAP = 'wap';
    /**
     *
     */
    const APP_CMS = 'cms';
    /**
     *
     */
    const APP_API = 'api';

    /**
     * @var Application The reference to *Singleton* instance of this class
     */
    private static $instance;


    /**
     * @var string
     */
    private $name;

    /**
     * Returns the *Singleton* instance of this class.
     * @return Application The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;

    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    public function __construct()
    {

        $configHost = require_once(config_path() . '/host.php');

        $name = isset($_SERVER['HTTP_HOST']) && isset($configHost[$_SERVER['HTTP_HOST']]) ? $configHost[$_SERVER['HTTP_HOST']] : $configHost['default'];
        if($name == self::APP_DEFAULT){
            $detect = new \Mobile_Detect();
            if($detect->isMobile()){
                $name = self::APP_WAP;
            }
        }

        $this->setName($name);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

}