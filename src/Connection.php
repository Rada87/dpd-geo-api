<?php

namespace Rada87\DpdGeoApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Rada87\DpdGeoApi\Enums\Modes;
use Rada87\DpdGeoApi\Exceptions\DpdApiGeneralException;

class Connection {
    private $apiKey;
    private $client;

    public function __construct($apiKey, $mode) {
        $this->apiKey = $apiKey;
        $this->client = new Client([
            'base_uri' => $this->getEndpointUrl($mode),
            'timeout'  => 2.0,
            'verify'  => false // SSL verification
        ]);
    }

    /**
     * @param string $mode
     * @return string
     */
    private function getEndpointUrl($mode)
    {
        if ($mode == Modes::PRODUCTION) {
            return 'https://geoapi.dpd.cz';
        } else {
            return 'https://geoapi-test.dpd.cz';
        }
    }

    /**
     * @param $method
     * @param $endpoint
     * @param $data
     * @return mixed
     * @throws DpdApiGeneralException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */

    public function sendRequest($method, $endpoint, $data = []) {
        try {
            $options = ['headers' => ['x-api-key' => $this->apiKey]];
            if ($method === 'POST') {
                $data = $this->removeNullValues($data);
                $options['json'] = $data;
            }

            $response = $this->client->request($method, $endpoint, $options);
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                throw new DpdApiGeneralException('API Request Failed: ' . $e->getResponse()->getReasonPhrase() . ' ' . $e->getMessage());
            } else {
                throw new DpdApiGeneralException('API Request Failed: ' . $e->getMessage());
            }
        }
    }

    private function removeNullValues($data) {
        if (is_array($data)) {
            return array_filter(array_map([$this, 'removeNullValues'], $data), function($value) {
                return !is_null($value);
            });
        } elseif (is_object($data)) {
            foreach ($data as $key => $value) {
                if (is_null($value)) {
                    unset($data->$key);
                } elseif (is_array($value) || is_object($value)) {
                    $data->$key = $this->removeNullValues($value);
                }
            }
            return $data;
        }
        return $data;
    }


}