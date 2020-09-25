<?php


namespace DTK\client;


use DTK\Client;
use DTK\request\original\ActivityGoodsListReq;
use DTK\request\original\BrandListReq;
use DTK\request\original\CatalogueReq;
use DTK\request\original\DdqGoodsListReq;
use DTK\request\original\ExclusiveGoodsListReq;
use DTK\request\original\ExplosiveGoodsListReq;
use DTK\request\original\FriendsCircleListReq;
use DTK\request\original\GoodsListReq;
use DTK\request\original\ListSimilerGoodsByOpenReq;
use DTK\request\original\LiveMaterialGoodsListReq;
use DTK\request\original\OpGoodsListReq;
use DTK\request\original\RankingListReq;
use DTK\request\original\TbTopicListReq;

/**
 * 特色栏目API
 * Class Original
 * @package DTK\client
 *
 * @method Original getTbTopicList(TbTopicListReq $request) 官方活动推广
 * @method Original ddqGoodsList(DdqGoodsListReq $request) 咚咚抢
 * @method Original getRankingList(RankingListReq $request) 各大榜单
 * @method Original catalogue(CatalogueReq $request) 精选专辑
 * @method Original goodsList(GoodsListReq $request) 专辑商品
 * @method Original opGoodsList(OpGoodsListReq $request) 9.9包邮精选
 * @method Original getBrandList(BrandListReq $request) 品牌库
 * @method Original listSimilerGoodsByOpen(ListSimilerGoodsByOpenReq $request) 猜你喜欢
 * @method Original activityGoodsList(ActivityGoodsListReq $request) 活动商品
 * @method Original activityCatalogue(ActivityGoodsListReq $request) 热门活动
 * @method Original liveMaterialGoodsList(LiveMaterialGoodsListReq $request) 直播好货
 * @method Original explosiveGoodsList (ExplosiveGoodsListReq $request) 每日爆品推荐
 * @method Original exclusiveGoodsList (ExclusiveGoodsListReq $request) 大淘客独家券商品
 * @method Original friendsCircleList (FriendsCircleListReq $request) 朋友圈文案
 */
class Original extends Client
{
    public function __call($name, $arguments)
    {
        $request = $arguments[0];
        return $this->run($request);
    }
}