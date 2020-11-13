<?php

namespace DTK\request\basic;

use DTK\request\Request;

/**
 * 超级分类
 * Class SuperCategoryReq
 * @package DTK\request\basic
 */
class SuperCategoryReq extends Request
{
    public $affiliation = 'basic';

    protected $address = "category/get-super-category";

    protected $version = 'v1.1.0';

    protected $checkParams = [];

    protected $cacheTime = 60;
}