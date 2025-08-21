<?php
namespace Dobesun\Jdsdk\Requests\ListProducts;

class GetDetailProductRequest extends ListProductsRequest
{
    protected $uri = 'sp-product/v0/products';

    protected $type = 'pop';

    protected $method = 'GET';

    protected $params = [
        'scene' => 'pop',
    ];

    public function __construct(string $accessToken, string $productId, string $scene = 'pop')
    {
        parent::__construct($accessToken);

        $this->uri = $this->uri . '/' . $productId;
        $this->params['scene'] = $scene;
    }

}