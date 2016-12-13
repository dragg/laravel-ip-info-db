<?php

namespace App\WiFiPlanet\IPInfoDB\Exceptions;


use Exception;

class IPInfoDBException extends Exception
{
    /**
     * @var int
     */
    protected $statusCode = 500;
}
