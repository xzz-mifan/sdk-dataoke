<?php

namespace DTK\request\original;

use DTK\request\Request;

/**
 * 直播好货
 * Class LiveMaterialGoodsListReq
 * @package DTK\request\original
 *
 * @method  setDate(string $value) 选择某一天的直播商品数据，默认返回全部参与过直播，且未下架的商品。时间格式：2020-09-16
 * @method  setSort(string $value) 排序方式，默认为0，0-综合排序，1-商品上架时间从高到低，2-销量从高到低，3-领券量从高到低，4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高
 */
class LiveMaterialGoodsListReq extends Request
{
    public $affiliation = 'original';

    protected $address = "goods/liveMaterial-goods-list";

    protected $version = 'v1.0.0';

    protected $cacheTime = 60;

    public function __call($name, $arguments)
    {
        $this->params[$name] = $arguments[0];
        return $this;
    }
}