<?php

namespace DTK\request\search;

use DTK\request\Request;

/**
 * 联想词
 * Class SuggestionReq
 * @package DTK\request\search
 *
 * @method SuggestionReq setKeyWords(string $value) 关键词 必须:是
 * @method SuggestionReq setType(int $value) 当前搜索API类型 必须:是 1.大淘客搜索 2.联盟搜索 3.超级搜索
 */
class SuggestionReq extends Request
{
    public $affiliation = 'search';

    protected $address = "goods/search-suggestion";

    protected $version = 'v1.0.2';

    protected $checkParams = ['keyWords', 'type'];

    protected $cacheTime = 360;
}