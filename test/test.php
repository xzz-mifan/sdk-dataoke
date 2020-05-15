<?php


include "../vendor/autoload.php";

/* 入库更新API-商品列表 */
$goodsListReq = new DTK\request\save\GoodsListReq();
$goodsListReq->setPageId(1);

/* 第一种 */
$result = DTK\client\Save::static()->getGoodsList($goodsListReq);
var_dump($result);

/* 第二种 */
$client = new \DTK\Client();
$result = $client->getGoodsList($goodsListReq);
var_dump($result);
