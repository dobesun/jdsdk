<?php
namespace Dobesun\JdSdk\Requests\ListProductApplies;

class PostListProductAppliesRequest extends ListProductAppliesRequest
{
    protected $method = 'POST';

    protected $params = [
        'schema' => [],
        'productApplyDTO' => [
            'productId' => null,
            'categoryDTO' => [
                'lastCategoryId' => null
            ]
        ],
        'scene' => 'pop',
    ];

    public function __construct(string $accessToken, string $scene = 'pop')
    {
        parent::__construct($accessToken);
        $this->params['scene'] = $scene;
    }
}