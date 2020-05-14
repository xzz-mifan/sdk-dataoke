<?php

namespace DTK\client;

use DTK\Client;
use DTK\request\Request;

/**
 * 入库更新API
 * Class Save
 * @package DTK\client
 *
 * @method Save getGoodsList(Request $request) 商品列表
 */
class Save extends Client
{

    public function __call($name, $arguments)
    {
        $request = $arguments[0];
        return $this->run($request);
    }

}