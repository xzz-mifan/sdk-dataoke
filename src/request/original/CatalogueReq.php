<?php

namespace DTK\request\original;

use DTK\request\Request;


/**
 * 精选专辑
 * Class CatalogueReq
 * @package DTK\request\original
 */
class CatalogueReq extends Request
{
    public $affiliation = 'original';

    protected $address = "topic/catalogue";

    protected $version = 'v1.1.0';

    protected $checkParams = ['rankType'];

    protected $cacheTime = 60;


}