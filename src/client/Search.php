<?php


namespace DTK\client;


use DTK\Client;
use DTK\request\search\DtkSearchGoodsReq;
use DTK\request\search\SuggestionReq;
use DTK\request\search\SuperGoodsReq;
use DTK\request\search\TbServiceReq;
use DTK\request\search\Top100Req;

/**
 * 搜索相关API
 * Class Search
 * @package DTK\client
 *
 * @method Search getSuggestion(SuggestionReq $request) 联想词
 * @method Search listSuperGoods(SuperGoodsReq $request) 超级搜索
 * @method Search getDtkSearchGoods(DtkSearchGoodsReq $request) 大淘客搜索
 * @method Search getTop100(Top100Req $request) 热搜记录
 * @method Search getTbService(TbServiceReq $request) 联盟搜索
 */
class Search extends Client
{
    public function __call($name, $arguments)
    {
        $request = $arguments[0];
        return $this->run($request);
    }
}