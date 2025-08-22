<?php
namespace Dobesun\JdSdk\Requests\ListVenderBrands;

use Dobesun\JdSdk\Requests\BaseRequest;

/**
 * 获取商家经营品牌，包括：1、查询授权品牌（可直接发品）；2、商家可选品牌（已授权+未授权）
        注意事项
        1、入参 queryType=1，返回查询已授权（可直接发品）的品牌；
        2、入参queryType=2，表示查询可选品牌，包含已授权+未授权的品牌；
        3、可选品牌每页最大支持49条；
        4、授权品牌全量返回，分页不生效；
        前提条件
        商家发品前，获取授权品牌，在商品中使用
        名词解释
        1、可选经营品牌：指在平台规则下商家当前可以选择的用于发布商品的品牌；
        2、授权品牌：指商家获得品牌授权商授权，并已在平台（品牌管理）维护该授权关系的品牌；
 */
class ListVenderBrandsRequest extends BaseRequest
{
    protected $uri = 'sp-seller/v0/vender-brands';

    protected $method = 'GET';

    protected $params = [
        'categoryId' => null,
        'queryType' => 1,
        'page' => 1,
        'pageSize' => 10,
        'brandName' => null,
    ];
}