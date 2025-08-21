<?php
namespace Dobesun\Jdsdk;

use GuzzleHttp\Client as GuzzleClient;

class Client
{
    public GuzzleClient $httpClient;

    public $appKey;
    public $appSecret;
    public $basePath;

    public function __construct(
        String $appKey,
        String $appSecret,
        String $basePath = 'https://api-cn.jd.com/rest'
    )
    {

        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
        $this->basePath = $basePath;
        $this->httpClient = new GuzzleClient([
            'base_uri' => $this->basePath,
            // 'proxy' => [
            //     'http'  => 'http://182.168.1.201:8866',  // HTTP 代理
            //     'https' => 'http://182.168.1.201:8866',  // HTTPS 代理
            // ],
            'verify' => false
        ]);

        return $this;
    }

    protected function setAppKey(String $appKey)
    {
        $this->appKey = $appKey;
    }

    protected function setAppSecret(String $appSecret)
    {
        $this->appSecret = $appSecret;
    }

    protected function setBasePath(String $basePath)
    {
        $this->basePath = $basePath;
    }
}
