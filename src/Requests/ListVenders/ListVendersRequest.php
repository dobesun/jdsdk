<?php

namespace Dobesun\JdSdk\Requests\ListVenders;

use Dobesun\JdSdk\Requests\BaseRequest;

/**
 * 分页查询商家基本信息列表
    注意事项
    分页参数每页最大100条，限制最大可查100页
    前提条件
    需商家授权后，方可调用成功
 */
class ListVendersRequest extends BaseRequest
{
    protected $uri = 'sp-seller/v0/venders';

    protected $method = 'GET';

    protected $params = [
        'accountType' => 1,     //账号类型（0：erp，1：pin）
        'pageSize' => 20,
        'page' => 1,
        'scopeSet' => [],
    ];
}