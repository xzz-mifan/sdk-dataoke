<?php

namespace DTK\request\search;

use DTK\request\Request;

/**
 * 超级搜索
 * Class SuperGoodsReq
 * @package DTK\request\search
 *
 * @method setType(int $value) 搜索类型：0-综合结果，1-大淘客商品，2-联盟商品
 * @method setPageId(int $value) 请求的页码，默认参数1
 * @method setPageSize(int $value) 每页条数，默认为20，最大值100
 * @method setKeyWords(int $value) 关键词搜索
 * @method setTmall(int $value) 是否天猫商品：1-天猫商品，0-所有商品，不填默认为0
 * @method setHaitao(int $value) 是否海淘商品：1-海淘商品，0-所有商品，不填默认为0
 * @method setSort (string $value) 排序字段信息 销量（total_sales） 价格（price），排序_des（降序），排序_asc（升序）
 */
class SuperGoodsReq extends Request
{
    public $affiliation = 'search';

    protected $address = "goods/list-super-goods";

    protected $version = 'v1.2.1';

    protected $checkParams = ['type', 'pageId', 'pageSize', 'keyWords'];

    protected $cacheTime = 360;


}