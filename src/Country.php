<?php

namespace App\WiFiPlanet\IPInfoDB;


class Country
{
    /**
     * @var string
     */
    private $code;
    
    /**
     * @var string
     */
    private $name;

    /**
     * Country constructor.
     * @param string $code
     * @param string $name
     */
    public function __construct(string $code, string $name)
    {
        $this->code = $code;
        $this->name = $name;
    }


    /**
     * @return string
     */
    public function getCode() : string 
    {
        return $this->code;
    }

    public function getName() : string
    {
        return $this->name;
    }
}