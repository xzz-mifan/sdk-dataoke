<?php

namespace DTK\request\original;

use DTK\request\Request;


/**
 * 专辑商品
 * Class GoodsListReq
 * @package DTK\request\original
 *
 * @method  setPageId(string $value) 分页id，支持传统的页码分页方式
 * @method  setPageSize(int $value) 每页条数，默认为20
 * @method  setTopicId(int $value) 专辑id，通过精选专辑API获取的活动id
 */
class GoodsListReq extends Request
{
    public $affiliation = 'original';

    protected $address = "topic/goods-list";

    protected $version = 'v1.2.2';

    protected $checkParams = ['pageId', 'topicId'];

    protected $cacheTime = 60;

    public function __call($name, $arguments)
    {
        $this->params[$name] = $arguments[0];
        return $this;
    }
}