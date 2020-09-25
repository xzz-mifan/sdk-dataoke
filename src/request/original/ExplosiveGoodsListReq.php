<?php

namespace DTK\request\original;

use DTK\request\Request;

/**
 * 每日爆品推荐
 * Class ExplosiveGoodsListReq
 * @package DTK\request\original
 *
 * @method  setPageId(string $value) 分页id：常规分页方式，请直接传入对应页码（比如：1, 2, 3……）
 * @method  setPageSize(int $value) 每页返回条数，每页条数支持输入10, 20，50, 100。默认50条
 * @method  setPriceCid(string $value) 价格区间，1表示10~20元区；2表示20~40元区；3表示40元以上区；默认为1
 * @method  setCids(string $value) 大淘客的一级分类id，如果需要传多个，以英文逗号相隔，如：”1, 2, 3”。1 -女装，2 -母婴，3 -美妆，4 -居家日用，5 -鞋品，6 -美食，7 -文娱车品，8 -数码家电，9 -男装，10 -内衣，11 -箱包，12 -配饰，13 -户外运动，14 -家装家纺。不填默认全部
 */
class ExplosiveGoodsListReq extends Request
{
    public $affiliation = 'original';

    protected $address = "goods/explosive-goods-list";

    protected $version = 'v1.0.0';

    protected $checkParams = ['pageId'];

    protected $cacheTime = 3600;

    public function __call($name, $arguments)
    {
        $this->params[$name] = $arguments[0];
        return $this;
    }
}