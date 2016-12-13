<?php

namespace App\WiFiPlanet\IPInfoDB;


use App\WiFiPlanet\IPInfoDB\Exceptions\InvalidAPIKeyException;
use App\WiFiPlanet\IPInfoDB\Exceptions\IPInfoDBException;
use GuzzleHttp\Client;

class IPInfoDB
{
    /**
     * @const string API base url
     */
    const BASE_URL = 'https://api.ipinfodb.com';
    /**
     * @const string API version
     */
    const API_VERSION = 'v3';

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    private $format;

    /**
     * IPInfoDB constructor.
     * @param string $apiKey
     * @param string $format
     */
    public function __construct(string $apiKey, string $format = 'json')
    {
        $this->apiKey = $apiKey;

        $this->client = new Client([
            'base_uri' => self::BASE_URL . '/' . self::API_VERSION . '/',
        ]);
        $this->format = $format;
    }


    /**
     * @param string $ip
     * @return Country
     */
    public function getCountry(string $ip): Country
    {
        $data = $this->send('ip-country', $ip);

        return new Country($data->countryCode, $data->countryName);
    }

    /**
     * @param string $ip
     * @return City
     */
    public function getCity(string $ip): City
    {
        $data = $this->send('ip-city', $ip);

        $country = new Country($data->countryCode, $data->countryName);

        return new City(
            $country,
            $data->regionName,
            $data->cityName,
            $data->zipCode,
            (float) $data->latitude,
            (float) $data->longitude,
            $data->timeZone
        );
    }

    /**
     * @param  string $endpoint
     * @param  string $ip
     * @return \Psr\Http\Message\ResponseInterface
     * @throws IPInfoDBException
     * @throws InvalidAPIKeyException
     */
    protected function send(string $endpoint, string $ip)
    {
        $response = $this->client->get($endpoint, [
            'query' => [
                'ip' => $ip,
                'key' => $this->apiKey,
                'format' => $this->format,
            ],
        ]);

        $responseJson = \GuzzleHttp\json_decode($response->getBody()->getContents());

        if ($responseJson->statusCode === 'ERROR') {
            $statusMessage = $responseJson->statusMessage;

            if ($statusMessage === "Invalid API key") {
                throw new InvalidAPIKeyException($statusMessage);
            } else {
                throw new IPInfoDBException($statusMessage);
            }
        }

        return $responseJson;
    }
}
