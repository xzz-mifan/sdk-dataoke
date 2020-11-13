<?php

namespace DTK\request\search;

use DTK\request\Request;

/**
 * 大淘客搜索
 * Class DtkSearchGoodsReq
 * @package DTK\request\search
 *
 * @method  setPageSize(int $value)
 * @method  setPageId(string $value)
 * @method  setKeyWords(string $value)
 * @method  setCids(string $value)
 * @method  setSubcid(int $value)
 * @method  setJuHuaSuan(int $value)
 * @method  setTaoQiangGou(int $value)
 * @method  setTmall(int $value)
 * @method  setTchaoshi(int $value)
 * @method  setGoldSeller(int $value)
 * @method  setHaitao(int $value)
 * @method  setBrand(int $value)
 * @method  setBrandIds(string $value)
 * @method  setPriceLowerLimit(int $value)
 * @method  setPriceUpperLimit(int $value)
 * @method  setCouponPriceLowerLimit(int $value)
 * @method  setCommissionRateLowerLimit(int $value)
 * @method  setMonthSalesLowerLimit(int $value)
 * @method  setSort(string $value)
 * @method  setFreeshipRemoteDistrict(int $value)
 */
class DtkSearchGoodsReq extends Request
{
    public $affiliation = 'search';

    protected $address = "goods/get-dtk-search-goods";

    protected $version = 'v2.1.2';

    protected $checkParams = ['pageId', 'pageSize', 'keyWords'];

    protected $cacheTime = 360;


}