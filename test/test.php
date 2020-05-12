<?php


include "../vendor/autoload.php";

$goodsListReq = new DTK\request\save\GoodsListReq();
$result = DTK\client\Save::static()
    ->getGoodsList($goodsListReq);
var_dump($result);

