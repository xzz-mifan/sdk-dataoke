<?php

namespace DTK\request\save;

use DTK\request\Request;

/**
 * 单品详情
 * Class GoodsDetailsReq
 * @package DTK\request\save
 *
 * @method setId(int $value) 大淘客商品id，请求时id或goodsId必填其中一个，若均填写，将优先查找当前单品id
 * @method setGoodsId(string $value) 淘宝商品id，id或goodsId必填其中一个，若均填写，将优先查找当前单品id
 */
class GoodsDetailsReq extends Request
{
    public $affiliation = 'save';

    protected $address = "goods/get-goods-details";

    protected $version = "v1.2.2";

    protected $checkParams = [];

    protected $cacheTime = 3600;


}