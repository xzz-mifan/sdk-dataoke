<?php

namespace DTK\request\save;

use DTK\request\Request;

/**
 * 定时拉取
 * Class GoodsByTimeReq
 * @package DTK\request\save
 *
 * @method  setPageId(string $value) 分页Id 必须:是, 默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入口商品重复；示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）
 * @method  setPageSize(int $value) 每页数量, 默认为100，最大值200，若小于10，则按10条处理，每页条数仅支持输入10, 50, 100, 200
 * @method  setCid(string $value) 大淘客的一级分类id。当一级类目id和二级类目id同时传入时，会自动忽略二级类目id
 * @method  setSubcid(int $value) 大淘客的二级类目id，通过超级分类API获取。仅允许传一个二级id，当一级类目id和二级类目id同时传入时，会自动忽略二级类目id
 * @method  setPre(int $value)  是否预告商品，1-预告商品，0-非预告商品
 * @method  setSort(string $value) 排序方式，默认为0，0-综合排序，1-商品上架时间从新到旧，2-销量从高到低，3-领券量从高到低，4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高
 * @method  setStartTime(string $value) 开始时间，格式为yy-mm-dd hh:mm:ss，商品下架的时间大于等于开始时间
 * @method  setEndTime(string $value) 结束时间，默认为请求的时间，商品下架的时间小于等于结束时间
 * @method  setFreeshipRemoteDistrict(int $value) 偏远地区包邮，1.是，0.否
 */
class GoodsByTimeReq extends Request
{
    public $affiliation = 'save';

    protected $address = "goods/pull-goods-by-time";

    protected $version = "v1.2.2";

    protected $checkParams = ['pageId'];

    protected $cacheTime = 3600;


}