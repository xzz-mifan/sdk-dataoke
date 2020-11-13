<?php

namespace DTK\request\original;

use DTK\request\Request;

/**
 * 朋友圈文案
 * Class FriendsCircleListReq
 * @package DTK\request\original
 *
 * @method  setPageId(string $value) 分页id：常规分页方式，请直接传入对应页码（比如：1, 2, 3……）
 * @method  setPageSize(int $value) 每页返回条数，每页条数支持输入10, 20，50, 100。默认50条
 * @method  setSort(string $value) 排序方式，默认为0，0-综合排序，1-商品上架时间从高到低，2-销量从高到低，3-领券量从高到低，4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高
 * @method  setCid(string $value) 大淘客的一级分类id，如果需要传多个，以英文逗号相隔，如：”1, 2, 3”。1 -女装，2 -母婴，3 -美妆，4 -居家日用，5 -鞋品，6 -美食，7 -文娱车品，8 -数码家电，9 -男装，10 -内衣，11 -箱包，12 -配饰，13 -户外运动，14 -家装家纺。不填默认全部
 * @method  setSubcid(string $value) 大淘客的二级类目id，通过超级分类API获取。仅允许传一个二级id，当一级类目id和二级类目id同时传入时，会自动忽略二级类目id
 * @method  setPre(int $value) 是否预告商品，1-预告商品，0-所有商品，不填默认为0
 * @method  setFreeshipRemoteDistrict(int $value) 偏远地区包邮，1-是，0-非偏远地区，不填默认所有商品
 * @method  setGoodsId(string $value) 大淘客id或淘宝id，查询单个商品是否有朋友圈文案，如果有，则返回商品信息及朋友圈文案，如果没有，显示10006错误
 */
class FriendsCircleListReq extends Request
{
    public $affiliation = 'original';

    protected $address = "goods/friends-circle-list";

    protected $version = 'v1.3.0';

    protected $checkParams = ['pageId'];

    protected $cacheTime = 3600;


}