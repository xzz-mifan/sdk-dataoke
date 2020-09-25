<?php


namespace DTK\client;


use DTK\Client;
use DTK\request\basic\ActivityLinkReq;
use DTK\request\basic\CollectionListReq;
use DTK\request\basic\CreatTaokoulingReq;
use DTK\request\basic\FirstOrderGiftMoneyReq;
use DTK\request\basic\OrderDetailsReq;
use DTK\request\basic\ParseContentReq;
use DTK\request\basic\ParseTaokoulingReq;
use DTK\request\basic\PrivilegeLinkReq;
use DTK\request\basic\SuperCategoryReq;
use DTK\request\basic\TwdToTwdReq;

/**
 * 基础功能API
 * Class Basic
 * @package DTK\client
 *
 * @method Basic getPrivilegeLink(PrivilegeLinkReq $request) 高效转链
 * @method Basic getSuperCategory(SuperCategoryReq $request) 超级分类
 * @method Basic getCollectionList(CollectionListReq $request) 我的收藏
 * @method Basic parseContent(ParseContentReq $request) 淘系万能解析
 * @method Basic activityLink(ActivityLinkReq $request) 官方活动会场转链
 * @method Basic twdToTwd(TwdToTwdReq $request) 淘口令转淘口令
 * @method Basic firstOrderGiftMoney(FirstOrderGiftMoneyReq $request) 首单礼金商品
 * @method Basic creatTaokouling(CreatTaokoulingReq $request) 淘口令生成
 * @method Basic getOrderDetails(OrderDetailsReq $request) 订单查询接口
 * @method Basic parseTaokouling(ParseTaokoulingReq $request) 淘口令解析
 */
class Basic extends Client
{
    public function __call($name, $arguments)
    {
        $request = $arguments[0];
        return $this->run($request);
    }
}