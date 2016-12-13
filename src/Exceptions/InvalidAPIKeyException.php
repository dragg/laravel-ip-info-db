<?php

namespace App\WiFiPlanet\IPInfoDB\Exceptions;



class InvalidAPIKeyException extends IPInfoDBException
{
    /**
     * @var int
     */
    protected $statusCode = 400;
}
