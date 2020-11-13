<?php

namespace DTK\request\original;

use DTK\request\Request;


/**
 * 咚咚抢
 * Class DdqGoodsListReq
 * @package DTK\request\original
 *
 * @method  setRoundTime(string $value) 默认为当前场次，场次时间输入方式：yyyy-mm-dd hh:mm:ss
 */
class DdqGoodsListReq extends Request
{
    public $affiliation = 'original';

    protected $address = "category/ddq-goods-list";

    protected $version = 'v1.2.0';

    protected $checkParams = [];

    protected $cacheTime = 60;


}