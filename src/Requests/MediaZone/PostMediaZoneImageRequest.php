<?php
namespace Dobesun\JdSdk\Requests\MediaZone;

use Dobesun\JdSdk\Requests\BaseRequest;

class PostMediaZoneImageRequest extends BaseRequest
{
    protected $uri = 'sp-product/v0/media-zones/{zoneId}/images';

    protected $method = 'POST';

    protected $pathParams = [
        'zoneId' => '',
    ];

    protected $body = [
        'imgBase64' => '',
        'zoneImageDTO' => [
            'imgName' => '',
            'categoryId' => ''
        ]
    ];

    public function __construct(string $accessToken, string $zoneId, string $base64, string $imgName, string $categoryId)
    {
        parent::__construct($accessToken);
        $this->body['imgBase64'] = $base64;
        $this->body['zoneImageDTO']['imgName'] = $imgName;
        $this->body['zoneImageDTO']['categoryId'] = $categoryId;
        $this->pathParams['zoneId'] = $zoneId;
    }
}