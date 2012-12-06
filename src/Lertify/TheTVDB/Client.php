<?php

namespace Lertify\TheTVDB;

use Lertify\TheTVDB\Api;
use Lertify\TheTVDB\Api\ApiInterface;
use Lertify\TheTVDB\Exception;

class Client
{

    /**
     * @var string
     */
    private $api_url = 'http://thetvdb.com/api/';

    /**
     * @var string
     */
    private $api_key;

    /**
     * The list of loaded API instances
     *
     * @var array
     */
    private $apis = array();

    /**
     * @param string $apiKey
     */
    public function __construct( $api_key )
    {
        $this->api_key = $api_key;
    }

    /**
     * @return string
     */
    public function getApiUrl()
    {
        return $this->api_url;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->api_key;
    }

    public function get($path, array $parameters = array(), $options = array()) {
        $ch = curl_init();

        $default_parameters = array(
            ':apikey' => $this->getApiKey()
        );

        $parameters = array_merge($default_parameters, $parameters);

        $path = preg_replace_callback('/:([a-zA-Z_]*)/', function($matches) use ($parameters) {
            return (isset($parameters[':' . $matches[1]]) ? $parameters[':' . $matches[1]] : '' );
        }, $path);

        foreach($parameters AS $key=>$value) {
            if(substr($key, 0, 1) == ':') unset($parameters[$key]);
        }

        $query = http_build_query($parameters);

        curl_setopt_array($ch, array(
            CURLOPT_URL => $this->getApiUrl().$path.(strpos($path,'?') === FALSE ? '?' : '&').$query,
            CURLOPT_USERAGENT => 'lertify-thetvdb-api',
            CURLOPT_PORT => (isset($options['port']) ? $options['port'] : 80),
            CURLOPT_TIMEOUT => (isset($options['timeout']) ? $options['timeout'] : 10),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FAILONERROR => false
        ));

        $response = curl_exec($ch);

        if(curl_errno($ch)) {
            throw new \RuntimeException( curl_error($ch) );
        }

        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if( $http_code === 404 ) {
            throw new Exception\NotFoundException( '404: Unknown error' );
        }

        $response = @simplexml_load_string($response);

        // check if valid XML
        if($response === FALSE) {
            throw new Exception\InvalidResponseException( 'Connection error or incorrect response' );
        }

        $response = (array) $response;
        $response = json_decode(json_encode($response, JSON_HEX_TAG), true);
        $response = $this->array_change_key_case_recursive($response, CASE_LOWER);
        return $response;
    }

    /**
     * Get API by name
     *
     * @param string $name API name
     * @throws \InvalidArgumentException
     * @return Api\AbstractApi
     */
    public function api( $name )
    {
        $name = strtolower($name);

        if ( isset( $this->apis[ $name ] ) ) return $this->apis[ $name ];

        switch ( $name ) {
            case 'language':
                return $this->apis['language'] = new Api\Language( $this );
            case 'series':
                return $this->apis['series'] = new Api\Series( $this );
            case 'episode':
                return $this->apis['episode'] = new Api\Episode( $this );
            case 'user':
                return $this->apis['user'] = new Api\User( $this );
            case 'updates':
                return $this->apis['updates'] = new Api\Updates( $this );
            default:
                throw new \InvalidArgumentException( 'API ' . $name .' not found' );
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

    /**
     * A recursive array_change_key_case function.
     * @param array $input
     * @param integer $case
     */
    protected function array_change_key_case_recursive($input, $case = null) {
        if(!is_array($input)){
            trigger_error("Invalid input array '{$input}'",E_USER_NOTICE); exit;
        }
        // CASE_UPPER|CASE_LOWER
        if(null === $case){
            $case = CASE_LOWER;
        }
        if(!in_array($case, array(CASE_UPPER, CASE_LOWER))){
            trigger_error("Case parameter '{$case}' is invalid.", E_USER_NOTICE); exit;
        }
        $input = array_change_key_case($input, $case);
        foreach($input as $key=>$array){
            if(is_array($array)){
                $input[$key] = $this->array_change_key_case_recursive($array, $case);
            }
        }
        return $input;
    }

}
