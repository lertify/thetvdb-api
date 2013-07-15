<?php

namespace Lertify\TheTVDB;

use Lertify\TheTVDB\Api;
use Lertify\TheTVDB\Exception;

/**
 * Class Client
 * @package Lertify\TheTVDB
 * @description Api client
 */
class Client
{

    /**
     * @var string
     */
    private $apiUrl = 'http://thetvdb.com/api/';

    /**
     * @var string
     */
    private $apiKey;

    /**
     * The list of loaded API instances
     *
     * @var array
     */
    private $apis = array();

    /**
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return string
     */
    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Make a request to the api server
     *
     * @param string $path
     * @param array $parameters
     * @param array $options
     * @return string
     * @throws \RuntimeException
     * @throws Exception\InvalidResponseException
     * @throws Exception\NotFoundException
     */
    public function get($path, array $parameters = array(), $options = array())
    {
        $ch = curl_init();

        $defaultParameters = array(
            ':apikey' => $this->getApiKey()
        );

        $parameters = array_merge($defaultParameters, $parameters);

        $path = preg_replace_callback('/:([a-zA-Z_]*)/', function($matches) use ($parameters) {
            return (isset($parameters[':' . $matches[1]]) ? $parameters[':' . $matches[1]] : '' );
        }, $path);

        foreach ($parameters as $key => $value) {
            if (substr($key, 0, 1) == ':') {
                unset($parameters[$key]);
            }
        }

        $query = http_build_query($parameters);

        curl_setopt_array($ch, array(
            CURLOPT_URL => $this->getApiUrl().$path.(false === strpos($path,'?') ? '?' : '&').$query,
            CURLOPT_USERAGENT => 'lertify-thetvdb-api',
            CURLOPT_PORT => (isset($options['port']) ? $options['port'] : 80),
            CURLOPT_TIMEOUT => (isset($options['timeout']) ? $options['timeout'] : 10),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FAILONERROR => false
        ));

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new \RuntimeException(curl_error($ch));
        }

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($httpCode === 404) {
            throw new Exception\NotFoundException('404: Unknown error');
        }

        // check if valid XML
        if (false === @simplexml_load_string($response)) {
            throw new Exception\InvalidResponseException('Connection error or incorrect response');
        }

        return $response;
    }

    /**
     * Get API by name
     *
     * @param string $name API name
     * @throws \InvalidArgumentException
     * @return Api\AbstractApi
     */
    public function api($name)
    {
        $name = strtolower($name);

        if (isset($this->apis[$name])) {
            return $this->apis[$name];
        }

        switch ($name) {
            case 'language':
                return $this->apis['language'] = new Api\Language($this);
            case 'series':
                return $this->apis['series'] = new Api\Series($this);
            case 'episode':
                return $this->apis['episode'] = new Api\Episode($this);
            case 'user':
                return $this->apis['user'] = new Api\User($this);
            case 'updates':
                return $this->apis['updates'] = new Api\Updates($this);
            default:
                throw new \InvalidArgumentException(sprintf('API %s not found', $name));
        }
    }

    /**
     * @return Api\Language
     */
    public function language()
    {
        return $this->api('language');
    }

    /**
     * @return Api\Series
     */
    public function series()
    {
        return $this->api('series');
    }

    /**
     * @return Api\Episode
     */
    public function episode()
    {
        return $this->api('episode');
    }

    /**
     * @return Api\User
     */
    public function user()
    {
        return $this->api('user');
    }

    /**
     * @return Api\Updates
     */
    public function updates()
    {
        return $this->api('updates');
    }

}
