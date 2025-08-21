<?php
namespace Dobesun\Jdsdk\Requests\ListVenderCategories;

use Dobesun\Jdsdk\Requests\ListVenderCategories\ListVenderCategoriesRequest;

class GetListVenderCategoriesRequest extends ListVenderCategoriesRequest
{
    protected $method = 'GET';

    protected $params = [
        'categoryIdList' => null,
        /**
         * 接口场景：
         * 1 - 类目校验 - 输入类目ID列表，返回是否可用
         * 2- 选择类目 - 输入类目ID列表，返回下级类目ID列表
         * 3- 返回输入的类目到末级，类目树
         */
        'sceneType' => 1,
    ];
}