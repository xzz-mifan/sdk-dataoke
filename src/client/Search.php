<?php


namespace DTK\client;


use DTK\Client;
use DTK\request\search\SuggestionReq;

/**
 * 搜索相关API
 * Class Search
 * @package DTK\client
 *
 * @method Search getSuggestion(SuggestionReq $request) 联想词
 */
class Search extends Client
{
    public function __call($name, $arguments)
    {
        $request = $arguments[0];
        return $this->run($request);
    }
}