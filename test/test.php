<?php


include "../vendor/autoload.php";

$goodsListReq = new DTK\request\save\GoodsListReq();
$result = DTK\client\Save::static('5daff4797f740', 'd9ec11c0a45f0213b68ed72a85790eb6')
    ->getGoodsList($goodsListReq);
var_dump($result);

