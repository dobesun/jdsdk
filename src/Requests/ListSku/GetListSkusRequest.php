<?php
namespace Dobesun\JdSdk\Requests\ListSku;

class GetListSkusRequest extends ListSkusRequest
{
    protected $method = 'GET';

    public $type = 'pop';

    protected $params = [
        'pageSize' => 10,
        'sortBy' => 'created',
        'sortType' => 'desc',
        'page' => 1,
    ];

    protected $popScopeSet = 'productId,skuId,productName,skuName,status,categoryId,logo,features,created,modified,onlineTime,offlineTime,upc_code,jdPrice,enable,saleAttrs,outerId,standardId,fillComment,fillStock';

    protected $vcScopeSet = 'productId,skuId,productName,skuName,status,categoryId,logo,features,created,modified,onlineTime,offlineTime,upc_code,jdPrice,enable,saleAttrs,outerId,standardId,fillComment,fillStock';

    public function __construct(string $accessToken, string $type = 'pop')
    {
        parent::__construct($accessToken);
        $this->type = $type;
        $this->assembleParams();
    }

    public function pop()
    {
        $this->type = 'pop';
        $this->assembleParams();
        return $this;
    }

    public function vc()
    {
        $this->type = 'vc';
        $this->assembleParams();
        return $this;
    }

    protected function assembleParams()
    {
        if ($this->type == 'pop') {
            $this->params['scopeSet'] = $this->popScopeSet;
        } else if ($this->type == 'vc') {
            $this->params['scopeSet'] = $this->vcScopeSet;
        }
    }


}