<?php

namespace DTK\request\original;

use DTK\request\Request;

/**
 * 官方活动推广
 * Class TbTopicListReq
 * @package DTK\request\original
 *
 * @method TbTopicListReq setPageId(String $value) 分页id，支持传统的页码分页方式
 * @method TbTopicListReq setPageSize(int $value) 每页条数，默认为20
 * @method TbTopicListReq setType(int $value) 输出的端口类型：0.全部（默认），1.PC，2.无线
 * @method TbTopicListReq setChannelID(int $value) 阿里妈妈上申请的渠道id
 */
class TbTopicListReq extends Request
{
    public $affiliation = 'original';

    protected $address = "category/get-tb-topic-list";

    protected $version = 'v1.2.0';

    protected $checkParams = ['pageId'];

    protected $cacheTime = 60;

    public function __call($name, $arguments)
    {
        $this->params[$name] = $arguments[0];
        return $this;
    }
}