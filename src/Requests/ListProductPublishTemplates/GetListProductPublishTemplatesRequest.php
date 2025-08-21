<?php
namespace Dobesun\Jdsdk\Requests\ListProductPublishTemplates;

use Dobesun\Jdsdk\Requests\ListProductPublishTemplates\ListProductPublishTemplatesRequest;

class GetListProductPublishTemplatesRequest extends ListProductPublishTemplatesRequest
{
    protected $method = 'GET';

    protected $params = [
        'lastCategoryId' => null,
        'productId' => null,
        'scene' => 'pop',
    ];

}