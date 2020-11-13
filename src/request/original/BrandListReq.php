<?php

namespace DTK\request\original;

use DTK\request\Request;


/**
 * 品牌库
 * Class BrandListReq
 * @package DTK\request\original
 *
 * @method  setPageId(string $value) 分页id，支持传统的页码分页方式
 * @method  setPageSize(int $value) 每页条数，默认为20
 */
class BrandListReq extends Request
{
    public $affiliation = 'original';

    protected $address = "tb-service/get-brand-list";

    protected $version = 'v1.1.1';

    protected $checkParams = ['pageId'];

    protected $cacheTime = 60;


}