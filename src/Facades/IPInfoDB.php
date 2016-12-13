<?php

namespace Dragg\IPInfoDB\Facades;


use Illuminate\Support\Facades\Facade;

class IPInfoDB extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'wifi-planet.ip-info-db';
    }

}
