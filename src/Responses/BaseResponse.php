<?php

namespace Dobesun\JdSdk\Responses;

use Psr\Http\Message\ResponseInterface;

class BaseResponse
{
    protected array $raw;
    protected $data;
    protected bool $success;
    protected array $errorList;

    public function __construct(ResponseInterface $response)
    {
        $this->parseResponse($response);
    }

    protected function parseResponse(ResponseInterface $response): void
    {
        $body = (string) $response->getBody();
        $decoded = json_decode($body, true);
        if (!is_array($decoded)) {
            throw new \RuntimeException('Invalid JSON response: ' . $body);
        }

        $this->raw       = $decoded;
        $this->data      = $this->decodeArrayJsonStrings($decoded['data'] ?? null);
        $this->success   = (bool)($decoded['success'] ?? false);
        $this->errorList = $decoded['errorList'] ?? [];
    }

    private function decodeArrayJsonStrings($value)
    {
        if (is_array($value)) {
            foreach ($value as $k => $v) {
                if (is_string($v)) {
                    $json = json_decode($v, true);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        $value[$k] = $json;
                    }
                }
            }
        }
        return $value;
    }

    /**
     * 获取原始响应数组
     */
    public function getRaw(): array
    {
        return $this->raw;
    }

    /**
     * 获取数据部分
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * 是否成功
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }

    /**
     * 获取错误信息
     */
    public function getErrorCode(): ?string
    {
        return $this->errorList['code'] ?? null;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorList['message'] ?? null;
    }

    public function getErrorDetails(): ?string
    {
        return $this->errorList['details'] ?? null;
    }
}
