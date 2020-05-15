<?php

namespace DTK\request\original;

use DTK\request\Request;


/**
 * 9.9包邮精选
 * Class OpGoodsListReq
 * @package DTK\request\original
 *
 * @method  setPageId(string $value) 分页id：常规分页方式，请直接传入对应页码
 * @method  setPageSize(int $value) 每页条数：默认为20，最大值100
 * @method  setNineCid(string $value) 9.9精选的类目id，分类id请求详情：-1-精选，1 -居家百货，2 -美食，3 -服饰，4 -配饰，5 -美妆，6 -内衣，7 -母婴，8 -箱包，9 -数码配件，10 -文娱车品
 */
class OpGoodsListReq extends Request
{
    public $affiliation = 'original';

    protected $address = "nine/op-goods-list";

    protected $version = 'v1.2.2';

    protected $checkParams = ['pageId', 'nineCid', 'pageSize'];

    protected $cacheTime = 60;

    public function __call($name, $arguments)
    {
        $this->params[$name] = $arguments[0];
        return $this;
    }
}