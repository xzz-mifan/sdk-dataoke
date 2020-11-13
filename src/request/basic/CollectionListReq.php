<?php

namespace DTK\request\basic;

use DTK\request\Request;

/**
 * 我的收藏
 * Class CollectionListReq
 * @package DTK\request\basic
 *
 * @method  setPageId(string $value) 分页Id 必须:是, 默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入口商品重复；示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）
 * @method  setPageSize(int $value) 每页数量, 默认为100，最大值200，若小于10，则按10条处理，每页条数仅支持输入10, 50, 100, 200
 * @method  setCid(string $value) 大淘客的一级分类id。当一级类目id和二级类目id同时传入时，会自动忽略二级类目id
 * @method  setTrailerType(int $value) 是否返回预告商品，1为预告商品，0位在线商品，不填则全部商品
 * @method  setSort(string $value) 排序方式，默认为0，0-综合排序，1-商品上架时间从新到旧，2-销量从高到低，3-领券量从高到低，4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高
 * @method  setCollectionTimeOrder(int $value) 加入收藏时间
 */
class CollectionListReq extends Request
{
    public $affiliation = 'basic';

    protected $address = "goods/get-collection-list";

    protected $version = 'v1.0.1';

    protected $checkParams = [];

    protected $cacheTime = 60;


}