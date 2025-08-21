<?php
namespace Dobesun\Jdsdk\Requests\ListSkuMaterials;

class GetListSkuMaterialsRequest extends ListSkuMaterialsRequest
{
    protected $method = 'GET';

    protected $params = [
        'materialTypes' => '2001',  // 31 白底图
                                // 32  场景图
                                // 33  卖点图
                                // 34  营销图
                                // 36  透明图
                                // 42  搜索推荐图
                                // 51  定时主图
                                // 2001  多主图视频
        'skuIds' => '10031293140037',
        'scopeSet' => '4'    //查询数据范围，1-图片素材(透图白底图)，2-文本素材(卖点)，3-多主图视频，4-定时主图

    ];

}