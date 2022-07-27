<?php

namespace TFASoft;

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

    /**
     * You have to pass access token to the constructor
     * 
     * @param string $accessToken
     */
    function __constructor(string $accessToken)
    {
        $this->accessToken = $accessToken;
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
     * Auth user
     * 
     * @param string $userToken
     * @return array
     */
    public function authUser(string $userToken): array
    {
        $api = "https://tele-fa-api.herokuapp.com/api/access/".$this->accessToken."/".$userToken;

        $data = [ // TODO : call the api and put real data in this
            "status" => 200,
            "data" => [],
        ];

        return $data;
    }
}
