<?php

namespace Dobesun\JdSdk\Responses\ListProducts;

use Dobesun\JdSdk\Responses\BaseResponse;
use Psr\Http\Message\ResponseInterface;

class GetListProductsResponse extends BaseResponse
{
    private $paginationData;

    protected function parseResponse(ResponseInterface $response): void
    {
        parent::parseResponse($response);

        $this->paginationData = $this->raw['paginationData'] ?? null;
    }

    public function getPaginationData()
    {
        return $this->paginationData;
    }
}