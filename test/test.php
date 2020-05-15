<?php


use DTK\request\basic\PrivilegeLinkReq;
use DTK\request\original\TbTopicListReq;
use DTK\request\search\SuggestionReq;

include "../vendor/autoload.php";

$client = new \DTK\Client();

/* 入库更新API-商品列表 */
$goodsListReq = new DTK\request\save\GoodsListReq();
$goodsListReq->setPageId(1);

// 第一种
//$result = DTK\client\Save::static()->getGoodsList($goodsListReq);
//var_dump($result);

// 第二种
//$result = $client->getGoodsList($goodsListReq);
//var_dump($result);

/* 基础功能API-高效转链 */
$privilegeLinkReq = new PrivilegeLinkReq();
$privilegeLinkReq->setGoodsId('607454770461');

// 第一种
//$result = \DTK\client\Basic::static()->getPrivilegeLink($privilegeLinkReq);
//var_dump($result);

// 第二种
//$result = $client->getPrivilegeLink($privilegeLinkReq);
//var_dump($result);

/* 搜索相关API-联想词 */
$suggestionReq = new SuggestionReq();
$suggestionReq->setKeyWords('洗衣');
$suggestionReq->setType(1);

// 第一种
//$result = \DTK\client\Search::static()->getSuggestion($suggestionReq);
//var_dump($result);

// 第二种
//$result = $client->getSuggestion($suggestionReq);
//var_dump($result);

/* 特色栏目API-官方活动推广 */
$tbTopicListReq = new TbTopicListReq();
$tbTopicListReq->setPageId(1);

// 第一种
//$result         = \DTK\client\Original::static()->getTbTopicList($tbTopicListReq);
//var_dump($result);

// 第二种
//$result = $client->getTbTopicList($tbTopicListReq);
//var_dump($result);