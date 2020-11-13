<?php

namespace DTK\request\original;

use DTK\request\Request;


/**
 * 各大榜单
 * Class RankingListReq
 * @package DTK\request\original
 *
 * @method  setRankType(int $value) 榜单类型，1.实时榜 2.全天榜 3.热推榜 4.复购榜 5.热词飙升榜 6.热词排行榜 7.综合热搜榜
 * @method  setCid(int $value) 大淘客一级类目id，仅对实时榜单、全天榜单有效
 */
class RankingListReq extends Request
{
    public $affiliation = 'original';

    protected $address = "goods/get-ranking-list";

    protected $version = 'v1.2.2';

    protected $checkParams = ['rankType'];

    protected $cacheTime = 60;


}