<?php

namespace DTK\request\original;

use DTK\request\Request;


/**
 * 猜你喜欢
 * Class ListSimilerGoodsByOpenReq
 * @package DTK\request\original
 *
 * @method  setId(int $value) 大淘客的商品id
 * @method  setSize(int $value) 每页条数，默认10 ， 最大值100
 */
class ListSimilerGoodsByOpenReq extends Request
{
    public $affiliation = 'original';

    protected $address = "goods/list-similer-goods-by-open";

    protected $version = 'v1.2.2';

    protected $checkParams = ['id'];

    protected $cacheTime = 60;

    public function __call($name, $arguments)
    {
        $this->params[$name] = $arguments[0];
        return $this;
    }
}