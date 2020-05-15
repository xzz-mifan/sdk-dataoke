<?php


namespace DTK\client;


use DTK\Client;
use DTK\request\original\TbTopicListReq;

/**
 * 特色栏目API
 * Class Original
 * @package DTK\client
 *
 * @method Original getTbTopicList(TbTopicListReq $request) 官方活动推广
 */
class Original extends Client
{
    public function __call($name, $arguments)
    {
        $request = $arguments[0];
        return $this->run($request);
    }
}