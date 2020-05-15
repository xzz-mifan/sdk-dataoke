<?php


namespace DTK\client;


use DTK\Client;
use DTK\request\basic\PrivilegeLinkReq;

/**
 * 基础功能API
 * Class Basic
 * @package DTK\client
 *
 * @method Basic getPrivilegeLink(PrivilegeLinkReq $request) 高效转链
 */
class Basic extends Client
{
    public function __call($name, $arguments)
    {
        $request = $arguments[0];
        return $this->run($request);
    }
}