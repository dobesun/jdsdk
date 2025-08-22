<?php
namespace Dobesun\JdSdk\Requests\MediaZone;

use Dobesun\JdSdk\Requests\BaseRequest;

class ListMediaZonesRequest extends BaseRequest
{
    protected $uri = 'sp-product/v0/media-zones';

    protected $method = 'GET';

    protected $params = [
        'zoneType' => 1,    // 1: 图片 2: 视频
    ];

    public function __construct(string $accessToken, int $zoneType = 1)
    {
        parent::__construct($accessToken);
        $this->params['zoneType'] = $zoneType;
    }
}