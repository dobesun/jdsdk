<?php
namespace Dobesun\JdSdk\Responses\ListSkus;

use Dobesun\JdSdk\Responses\BaseResponse;
use Psr\Http\Message\ResponseInterface;

class GetListSkusResponse extends BaseResponse
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