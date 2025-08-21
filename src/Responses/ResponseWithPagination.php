<?php
namespace Dobesun\Jdsdk\Responses;

use Dobesun\Jdsdk\Responses\BaseResponse;
use Psr\Http\Message\ResponseInterface;

class ResponseWithPagination extends BaseResponse
{
    protected $paginationData;

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