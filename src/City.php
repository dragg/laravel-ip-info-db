<?php

namespace App\WiFiPlanet\IPInfoDB;


class City
{
    /**
     * @var Country
     */
    private $country;

    /**
     * @var string
     */
    private $regionName;

    /**
     * @var string
     */
    private $cityName;

    /**
     * @var string
     */
    private $zipCode;

    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

    /**
     * @var string
     */
    private $timeZone;

    /**
     * Country constructor.
     * @param Country $country
     * @param string $regionName
     * @param string $cityName
     * @param string $zipCode
     * @param float $latitude
     * @param float $longitude
     * @param string $timeZone
     * @internal param string $countryCode
     * @internal param string $countryName
     * @internal param string $code
     * @internal param string $name
     */
    public function __construct(
        Country $country,
        string $regionName,
        string $cityName,
        string $zipCode,
        float $latitude,
        float $longitude,
        string $timeZone
    )
    {
        $this->country = $country;
        $this->regionName = $regionName;
        $this->cityName = $cityName;
        $this->zipCode = $zipCode;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->timeZone = $timeZone;
    }


    /**
     * @return Country
     */
    public function getCountry(): Country
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->country->getCode();
    }

    /**
     * @return string
     */
    public function getCountryName(): string
    {
        return $this->country->getName();
    }

    /**
     * @return string
     */
    public function getRegionName(): string
    {
        return $this->regionName;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->cityName;
    }

    /**
     * @return string
     */
    public function getZipCode() : string
    {
        return $this->zipCode;
    }

    /**
     * @return float
     */
    public function getLatitude() : float
    {
        return $this->latitude;
    }

    /**
     * @return float
     */
    public function getLongitude() : float
    {
        return $this->longitude;
    }

    /**
     * @return string
     */
    public function getTimeZone() : string
    {
        return $this->timeZone;
    }
}