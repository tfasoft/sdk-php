<?php

namespace TFASoft;

use GuzzleHttp\Client as HttpClient;

/**
 * TFASoft handler class
 * 
 */
class TFA
{
    /**
     * The access token will be stored here
     * 
     * @var string
     */
    protected string $accessToken;

    protected HttpClient $client;

    /**
     * You have to pass access token to the constructor
     * 
     * @param string $accessToken
     * @param string $baseUrl (optional. you can change api base url using this param)
     */
    function __construct(string $accessToken, string $baseUrl = 'https://tele-fa-api.herokuapp.com/')
    {
        $this->accessToken = $accessToken;
        $this->client = new HttpClient([
            'base_uri' => $baseUrl,
        ]);
    }

    /**
     * You can get the access token by this method
     * 
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * You can get the API base url by this method
     * 
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->client->getConfig('base_uri');
    }

    /**
     * Auth user
     * 
     * @param string $userToken
     * @return array
     */
    public function authUser(string $userToken): array
    {
        $api = "api/access/".$this->accessToken."/".$userToken;

        $response = $this->client->get($api);

        $data = [
            "status" => $response->getStatusCode(),
            "data" => json_decode($response->getBody()),
        ];

        return $data;
    }
}
