<?php

namespace DTK\request\basic;

use DTK\request\Request;

/**
 * 首单礼金商品
 *
 * 应用场景：将首单活动礼金商品作为营销专区，用于吸引粉丝，提升活跃和转化
 *
 * 接口说明：该接口返回大淘客首单礼金的商品列表，礼金金额为预估金额，随账号、领取时间变动。
 *
 * Class FirstOrderGiftMoneyReq
 * @package DTK\request\basic
 *
 * @method  setPageId(string $value) 分页id：常规分页方式，请直接传入对应页码（比如：1, 2, 3……）
 * @method  setPageSize(int $value) 每页返回条数，每页条数支持输入10, 20，50, 100。默认50条
 * @method  setSort(string $value) 排序方式，默认为0，0-综合排序，1-商品上架时间从高到低，2-销量从高到低，3-领券量从高到低，4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高
 * @method  setCids(string $value) 大淘客的一级分类id，如果需要传多个，以英文逗号相隔，如：”1, 2, 3”。1 -女装，2 -母婴，3 -美妆，4 -居家日用，5 -鞋品，6 -美食，7 -文娱车品，8 -数码家电，9 -男装，10 -内衣，11 -箱包，12 -配饰，13 -户外运动，14 -家装家纺。不填默认全部
 */
class FirstOrderGiftMoneyReq extends Request
{
    public $affiliation = 'basic';

    protected $address = "goods/first-order-gift-money";

    protected $version = 'v1.0.0';

    protected $checkParams = ['pageId'];

    protected $cacheTime = 60;


}