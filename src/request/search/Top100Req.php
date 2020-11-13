<?php

namespace DTK\request\search;

use DTK\request\Request;

/**
 * 热搜记录
 * Class Top100Req
 * @package DTK\request\search
 */
class Top100Req extends Request
{
    public $affiliation = 'search';

    protected $address = "category/get-top100";

    protected $version = 'v1.0.1';

    protected $checkParams = [];

    protected $cacheTime = 360;


}