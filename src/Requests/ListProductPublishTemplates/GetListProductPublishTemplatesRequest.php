<?php
namespace Dobesun\JdSdk\Requests\ListProductPublishTemplates;

use Dobesun\JdSdk\Requests\ListProductPublishTemplates\ListProductPublishTemplatesRequest;

class GetListProductPublishTemplatesRequest extends ListProductPublishTemplatesRequest
{
    protected $method = 'GET';

    protected $params = [
        'lastCategoryId' => null,
        'productId' => null,
        'scene' => 'pop',
    ];

}