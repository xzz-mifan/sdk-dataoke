<?php


namespace DTK\client;


use DTK\Client;
use DTK\request\basic\CollectionListReq;
use DTK\request\basic\PrivilegeLinkReq;
use DTK\request\basic\SuperCategoryReq;

/**
 * 基础功能API
 * Class Basic
 * @package DTK\client
 *
 * @method Basic getPrivilegeLink(PrivilegeLinkReq $request) 高效转链
 * @method Basic getSuperCategory(SuperCategoryReq $request) 超级分类
 * @method Basic getCollectionList(CollectionListReq $request) 我的收藏
 */
class Basic extends Client
{
    public function __call($name, $arguments)
    {
        $request = $arguments[0];
        return $this->run($request);
    }
}