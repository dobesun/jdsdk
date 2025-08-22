<?php

namespace Dobesun\JdSdk\Requests;

use GuzzleHttp\Psr7\Response;
use Dobesun\JdSdk\Client;
use Illuminate\Support\Str;
use Dobesun\JdSdk\Sign\Signer;
use Illuminate\Support\Facades\Log;

class BaseRequest extends AbstractRequest
{
    protected $uri = '';

    protected $method = '';

    protected $params = [];

    private Client $client;

    protected $headers = [];

    protected $timestamp = 0;

    protected $appKey = '';
    protected $appSecret = '';
    protected $accessToken = '';

    public function __construct(string $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function setParams(array $params)
    {
        $this->params = $params;
    }

    public function setParam(string $key, $value)
    {
        if (is_array($value)) {
            $value = implode(',', $value);
        }
        $this->params[$key] = $value;
    }


    public function parseResponse(Response $response): Response
    {
        return $response;
    }

    public function build(Client $client): self
    {
        $this->client = $client;
        $timestamp = intval(microtime(true) * 1000);
        $signer = new Signer($timestamp, $this->accessToken);
        $sign = $signer->sign(static::getParams());

        $this->headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Accept-encoding' => 'gzip',
            'x-jos-access-token' => $this->accessToken,
            'x-jos-app-key' => $this->client->appKey,
            'x-jos-sign' => $sign,
            'x-jos-timestamp' => $timestamp,
            'x-jos-sdk-version' => 'java-v2',
        ];

        return $this;
    }

    public function fire(): Response
    {
        $method = 'restfull' . ucfirst(Str::lower($this->method));
        return $this->$method();
    }

    protected function restfullGet()
    {
        Log::info('restfullGet', [
            'uri' => $this->uri,
            'headers' => $this->headers,
            'params' => $this->params,
        ]);
        return $this->client->httpClient->get($this->uri, [
            'headers' => $this->headers,
            'query' => $this->params,
        ]);
    }

    protected function restfullPost()
    {
        return $this->client->httpClient->post($this->uri, [
            'headers' => $this->headers,
            'json' => $this->params,
        ]);
    }

    protected function restfullPut()
    {
        return $this->client->httpClient->put($this->uri, [
            'headers' => $this->headers,
            'json' => $this->params,
        ]);
    }

    protected function restfullDelete()
    {
        return $this->client->httpClient->delete($this->uri, [
            'headers' => $this->headers,
            'json' => $this->params,
        ]);
    }
}