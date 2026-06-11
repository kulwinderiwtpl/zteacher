<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/15 0015
 * Time: 下午 13:58
 */

namespace App\Tool;


class APIHelper
{

    public $base_url;

    public $timeout;    //请求超时

    public function __construct($base_url, $timeout = 60)
    {
        $this->base_url = $base_url;
        $this->timeout = $timeout;
    }

    public function post($body, $apiStr)
    {
        $client = new \GuzzleHttp\Client(['base_uri' => $this->base_url]);
        $res = $client->request('POST', $apiStr,
            [
                'verify' => false,
                'form_params' => $body,
            ]);
        $data = $res->getBody()->getContents();

        $response = json_decode($data, true);

        return $response;
    }

    public function get($apiStr, $query = '')
    {
        $client = new \GuzzleHttp\Client(['base_uri' => $this->base_url]);
        $res = $client->request('GET', $apiStr,
            [
                'timeout' => $this->timeout,
                'verify' => false,
                'query' => $query,
            ]
        );

        $statusCode = $res->getStatusCode();

        $header = $res->getHeader('content-type');

        $data = $res->getBody()->getContents();

        $response = json_decode($data, true);

        return $response;
    }

    public function post_user($body, $apiStr)
    {
        $client = new \GuzzleHttp\Client(['base_uri' => $this->base_url]);
        $res = $client->request('POST', $apiStr,
            ['verify' => false,
                'json' => $body,
                'headers' => [
                    'Content-type' => 'application/json']
            ]);
        $data = $res->getBody()->getContents();

        $response = json_decode($data, true);

        return $response;
    }


}