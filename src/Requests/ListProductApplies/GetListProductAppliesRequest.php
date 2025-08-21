<?php

namespace Dobesun\Jdsdk\Requests\ListProductApplies;

/**
 * @url https://open.jd.com/v2/#/doc/api?apiCateId=100081&apiId=100510&apiName=listProductApplies&gwType=1
 */
class GetListProductAppliesRequest extends ListProductAppliesRequest
{
    protected $method = 'GET';

    protected $type = 'pop';

    protected $params = [
        'productIdList' => null,
        'keeperStatus' =>   null,   //合规状态，只支持自营商家。109:"待合规审核",309:"合规驳回",200:"合规审核通过",400:"合规撤销"
        'statusList' => null,
        'modifiedStartTime' => null,
        'modifiedEndTime' => null,
        'createStartTime' => null,
        'productName' => null,
        'createEndTime' => null,
        'auditEndTime' => null,
        'auditStartTime' => null,
        'productApplyType' => null, //申请单类型：1：新增（新品），2：修改（老品），只支持POP商家
        'page' => 1,
        'pageSize' => 10,
        'sortBy' => 'created',
        'sortType' => 'desc',
    ];

    protected $popScopeSet = [
        'productId',
        'productName',
        'logo',
        'version',
        'created',
        'auditTime',
        'modified',
        'applyType',
        'draftComputeStatus',
        'keeperStatus',
        'draftStatus',
        'keeperReason',
        'pushReason',
        'source',
        'categoryId',
        'features'
    ];


    public function __construct(string $accessToken, string $type = 'pop')
    {
        parent::__construct($accessToken);
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
        return $this;
    }

    protected function assembleParams()
    {
        $this->params['scopeSet'] = implode(',', $this->popScopeSet);
    }
}
