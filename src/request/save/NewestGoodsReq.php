<?php

namespace DTK\request\save;

use DTK\request\Request;

/**
 * 商品更新
 * Class NewestGoodsReq
 * @package DTK\request\save
 *
 * @method  setPageId(string $value) 分页Id 必须:是, 默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入口商品重复；示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）
 * @method  setPageSize(int $value) 每页数量, 默认为100，最大值200，若小于10，则按10条处理，每页条数仅支持输入10, 50, 100, 200
 * @method  setStartTime(string $value) 商品上架开始时间，请求格式：yyyy-MM-dd HH:mm:ss
 * @method  setEndTime(string $value) 商品上架结束时间，请求格式：yyyy-MM-dd HH:mm:ss
 * @method  setCids(string $value) 大淘客的一级分类id，如果需要传多个，以英文逗号相隔，如：”1, 2, 3”。当一级类目id和二级类目id同时传入时，会自动忽略二级类目id，1 -女装，2 -母婴，3 -美妆，4 -居家日用，5 -鞋品，6 -美食，7 -文娱车品，8 -数码家电，9 -男装，10 -内衣，11 -箱包，12 -配饰，13 -户外运动，14 -家装家纺
 * @method  setSubcid(int $value) 大淘客的二级类目id，通过超级分类API获取。仅允许传一个二级id，当一级类目id和二级类目id同时传入时，会自动忽略二级类目id
 * @method  setJuHuaSuan(int $value) 1-聚划算商品，0-非聚划算商品，不填默认全部商品
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
 */
class NewestGoodsReq extends Request
{
    public $affiliation = 'save';

    protected $address = "goods/get-newest-goods";

    protected $version = "v1.1.0";

    protected $checkParams = ['pageId', 'pageSize'];

    protected $cacheTime = 3600;

    public function __call($name, $arguments)
    {
        $this->params[$name] = $arguments[0];
        return $this;
    }
}