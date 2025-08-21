<?php
namespace Dobesun\Jdsdk\Requests\ListProducts;

class GetListProductsRequest extends ListProductsRequest
{
    protected $method = 'GET';

    protected $type = 'pop';

    protected $params = [
        'pageSize' => 10,
        'sortBy' => 'created',
        'sortType' => 'desc',
        'page' => 1,
    ];

    protected $popScopeSet = ['productId', 'productName', 'brandId', 'productStatus', 'categoryId', 'multiCategoryId', 'features', 'colType', 'logo', 'created', 'modified', 'jdPrice', 'minJdPrice', 'maxJdPrice', 'stockNum', 'costPrice', 'marketPrice', 'itemNum', 'upc_code', 'salesVolume', 'shopCategorys', 'adWords', 'length', 'width', 'height', 'weight', 'model', 'placeOfProduction', 'outId', 'standardId', 'templateIds', 'specialServices', 'transportId', 'delivery', 'packListing', 'promiseId', 'afterSales', 'afterSaleDesc', 'designConcept', 'productTax', 'images', 'introductions', 'zhuangBaId', 'zhuangBaIntroduction', 'introductionUseFlag', 'fitCaseHtmlPc', 'fitCaseHtmlApp', 'fillBrandName', 'fillCategoryName', 'fillComment', 'fillHealthScore', 'fillPresale', 'fillPriceStar', 'fillPromotion', 'fillShopCategory', 'fillLimitArea'];

    protected $vcScopeSet = ['productId', 'productName', 'brandId', 'productStatus', 'categoryId', 'multiCategoryId', 'features', 'logo', 'created', 'modified', 'itemNum', 'upc_code', 'isgy', 'isMainProduct', 'saler', 'zzms', 'isOverseaPurchase', 'isXnzt', 'mainZtType', 'IsShadowSku', 'cxkfl', 'subCrossCategory', 'subCrossBrand', 'subCrossSupplier', 'supply_unit', 'fillBrandName', 'fillCategoryName', 'fillComment', 'fillHealthScore', 'fillJdPrice'];

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
    }

    public function vc()
    {
        $this->type = 'vc';
        $this->assembleParams();
    }

    protected function assembleParams()
    {
        $this->params['scopeSet'] = $this->type === 'pop' ? implode(',', $this->popScopeSet) : implode(',', $this->vcScopeSet);
    }
}