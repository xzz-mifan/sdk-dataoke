<?php

namespace DTK\request\original;

use DTK\request\Request;


/**
 * 热门活动
 * Class ActivityCatalogueReq
 * @package DTK\request\original
 *
 */
class ActivityCatalogueReq extends Request
{
    public $affiliation = 'original';

    protected $address = "goods/activity/catalogue";

    protected $version = 'v1.1.0';

    protected $checkParams = [];

    protected $cacheTime = 60;


}