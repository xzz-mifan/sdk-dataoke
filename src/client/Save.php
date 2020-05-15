<?php

namespace DTK\client;

use DTK\Client;
use DTK\request\save\GoodsByTimeReq;
use DTK\request\save\GoodsDetailsReq;
use DTK\request\save\GoodsListReq;
use DTK\request\save\NewestGoodsReq;
use DTK\request\save\StaleGoodsByTimeReq;

/**
 * 入库更新API
 * Class Save
 * @package DTK\client
 *
 * @method Save getGoodsList(GoodsListReq $request) 商品列表
 * @method Save getGoodsDetails(GoodsDetailsReq $request) 单品详情
 * @method Save pullGoodsByTime(GoodsByTimeReq $request) 定时拉取
 * @method Save getStaleGoodsByTime(StaleGoodsByTimeReq $request) 失效商品
 * @method Save getNewestGoods(NewestGoodsReq $request) 商品更新
 */
class Save extends Client
{

    public function __call($name, $arguments)
    {
        $request = $arguments[0];
        return $this->run($request);
    }

}