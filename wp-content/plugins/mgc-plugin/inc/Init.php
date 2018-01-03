<?php
/**
 * @package MgcPlugin
 */


namespace Inc;

final class Init
{
    /**
     * Store all the classes inside an array
     * @return array Full list of clases
     */

    public static function get_services()
    {
        return [
            Pages\Admin::class,
            Pages\CPT::class,
            Base\Enqueue::class,
            Base\CreateRole::class,
            Base\SettingsLinks::class,
            Api\RestRouteApi::class
        ];
    }

    /**
     * Loop through the classes, initialise them
     * and call the register method if it exists
     */


    public static function register_services()
    {
        foreach (self::get_services() as $class) {

            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }

    }

    /**Initilalise the class
     * @param $class from services array
     * @return class instance new  instance of the class
     * */

    private static function instantiate($class)
    {
        //store services and instantiate all classes
        $service = new $class();
        return $service;
    }

}

