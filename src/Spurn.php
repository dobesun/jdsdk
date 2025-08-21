<?php
namespace Dobesun\Jdsdk;

use Dobesun\Jdsdk\Requests\BaseRequest;
use Dobesun\Jdsdk\Client;
class Spurn
{
    protected $client;

    public function __construct(String $appKey, String $appSecret, String $apiPath)
    {
        $this->client = new Client($appKey, $appSecret, $apiPath);
    }


    public function pfft(BaseRequest $request)
    {
        return $request->build($this->client)->fire();
    }

}