<?php

namespace DTK\request\save;

use DTK\request\Request;

/**
 * 商品列表
 * Class GoodsListReq
 * @package DTK\request\save
 *
 * @method GoodsListReq setPageId(int $value) 分页Id 必须:是, 默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入口商品重复；示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）
 * @method GoodsListReq setPageSize(int $value) 每页数量, 默认为100，最大值200，若小于10，则按10条处理，每页条数仅支持输入10, 50, 100, 200
 * @method GoodsListReq setSort(string $value) 排序, 默认为0，0-综合排序，1-商品上架时间从高到低，2-销量从高到低，3-领券量从高到低，4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高
 * @method GoodsListReq setCids(string $value) 大淘客的一级分类id, 如果需要传多个，以英文逗号相隔，如：”1, 2, 3”。当一级类目id和二级类目id同时传入时，会自动忽略二级类目id
 * @method GoodsListReq setSubcid(int $value)
 * @method GoodsListReq setSpecialId(int $value)
 * @method GoodsListReq setJuHuaSuan(int $value)
 * @method GoodsListReq setTaoQiangGou(int $value)
 * @method GoodsListReq setTmall(int $value)
 * @method GoodsListReq setTchaoshi(int $value)
 * @method GoodsListReq setGoldSeller(int $value)
 * @method GoodsListReq setHaitao(int $value)
 * @method GoodsListReq setPre(int $value)
 * @method GoodsListReq setBrand(int $value)
 * @method GoodsListReq setPriceLowerLimit(int $value)
 * @method GoodsListReq setPriceUpperLimit(int $value)
 * @method GoodsListReq setCouponPriceLowerLimit(int $value)
 * @method GoodsListReq setCommissionRateLowerLimit(int $value)
 * @method GoodsListReq setMonthSalesLowerLimit(int $value)
 * @method GoodsListReq setFreeshipRemoteDistrict(int $value)
 */
class GoodsListReq extends Request
{
    public $affiliation = 'save';

    protected $address = "goods/get-goods-list";

    protected $checkParams = ['pageId'];

    protected $cacheTime = 3600;

    public function __call($name, $arguments)
    {
        $this->params[$name] = $arguments[0];
        return $this;
    }
}