<?php namespace SellerCenter\SDK\RawRequest;

use GuzzleHttp\Client;

/**
 * Class RawRequestClient
 * @package SellerCenter\SDK\Order
 */
class RawRequestClient
{

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var string
     */
    protected $environment;

    /**
     * @var array
     */
    protected $defaults;

    /**
     * RawRequestClient constructor.
     * @param array $config
     */
    public function __construct($config = [])
    {
        $this->client = new Client();
        $this->endpoint = $config['endpoint'];
        $this->environment = isset($config['environment']) ? $config['environment'] : null;
        $this->defaults = isset($config['defaults']) ? $config['defaults'] : [];
    }

    /**
     * @param $params
     * @return \GuzzleHttp\Message\FutureResponse|\GuzzleHttp\Message\ResponseInterface|\GuzzleHttp\Ring\Future\FutureInterface|null
     */
    public function get($params)
    {
        $options = $this->buildOptionsToRequest($params);
        return $this->client->get(
            $this->endpoint,
            $options
        );
    }

    /**
     * @param $params
     * @param $body
     * @return \GuzzleHttp\Message\FutureResponse|\GuzzleHttp\Message\ResponseInterface|\GuzzleHttp\Ring\Future\FutureInterface|null
     */
    public function post($params, $body)
    {
        $options = $this->buildOptionsToRequest($params, $body);
        return $this->client->post(
            $this->endpoint,
            $options
        );
    }

    /**
     * @return bool|mixed
     */
    protected function getVerifyOption()
    {
        if (isset($this->defaults['verify'])) {
            return $this->defaults['verify'];
        }

        return $this->environment == 'development' ? false : true;
    }

    /**
     * @return mixed|null
     */
    protected function getAuth()
    {
        return isset($this->defaults['auth']) ? $this->defaults['auth'] : null;
    }

    /**
     * @param $params
     * @param null $body
     * @return array
     */
    protected function buildOptionsToRequest($params, $body = null)
    {
        return [
            'query' => $params,
            'verify' => $this->getVerifyOption(),
            'auth' => $this->getAuth(),
            'body' => $body
        ];
    }

}