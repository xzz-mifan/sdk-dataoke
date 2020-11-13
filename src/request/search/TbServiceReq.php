<?php

namespace DTK\request\search;

use DTK\request\Request;

/**
 * 联盟搜索
 * Class TbServiceReq
 * @package DTK\request\search
 *
 * @method setPageNo(int $value) 第几页，默认1
 * @method setPageSize(int $value) 每页条数， 默认20，范围值1~100
 * @method setKeyWords(string $value) 查询词
 * @method setSort(string $value)
 * @method setSource(int $value)
 * @method setOverseas(int $value)
 * @method setEndPrice(int $value)
 * @method setStartPrice(int $value)
 * @method setStartTkRate(int $value)
 * @method setEndTkRate(int $value)
 * @method setHasCoupon(bool $value)
 */
class TbServiceReq extends Request
{
    public $affiliation = 'search';

    protected $address = "tb-service/get-tb-service";

    protected $version = 'v2.0.0';

    protected $checkParams = ['pageNo', 'pageSize', 'keyWords'];

    protected $cacheTime = 360;


}