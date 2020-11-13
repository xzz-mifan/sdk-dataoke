<?php

namespace DTK\request\basic;

use DTK\request\Request;

/**
 * 淘系万能解析
 *
 * 应用场景：将从其他渠道获取的淘口令或者链接解析出信息后，便于用户自购或是二次转链用于传播分享。
 *
 * 接口说明：此接口能解析任何绝大部分淘口令和链接，更多类型还在丰富中（目前还不支持淘礼金）
 *
 * Class ParseContentReq
 * @package DTK\request\basic
 *
 * @method  setContent(string $value) 包含淘口令、链接的文本。优先解析淘口令，再按序解析每个链接，直至解出有效信息。如果淘口令失效或者不支持的类型的情况，会按顺序解析链接。如果存在解析失败，请再试一次
 */
class ParseContentReq extends Request
{
    public $affiliation = 'basic';

    protected $address = "tb-service/parse-content";

    protected $version = 'v1.0.0';

    protected $checkParams = ['content'];

    protected $cacheTime = 60;
}