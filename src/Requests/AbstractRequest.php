<?php
namespace Dobesun\Jdsdk\Requests;

use GuzzleHttp\Psr7\Response;
use Dobesun\Jdsdk\Client;
abstract class AbstractRequest
{
    abstract public function getUri(): string;

    abstract public function getMethod(): string;

    abstract public function getParams(): array;

    abstract public function parseResponse(Response $response): Response;

    abstract public function build(Client $client): self;

    abstract public function fire(): Response;
}
