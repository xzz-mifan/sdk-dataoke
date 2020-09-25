<?php

namespace DTK\request\basic;

use DTK\request\Request;

/**
 * 淘口令生成
 *
 * 应用场景：针对导购或返利平台，分享时生成商品淘口令，对于素材圈的商品复制口令；同时可以满足用户提供淘口令生成工具
 *
 * 接口说明：该接口可以将二合一链接、长链接、短链接等各种淘宝高佣链接，生成淘口令
 *
 * Class CreatTaokoulingReq
 * @package DTK\request\basic
 *
 * @method  setText(string $value) 口令弹框内容，长度大于5个字符
 * @method  setUrl(string $value) 口令跳转目标页，如：https://uland.taobao.com/，必须以https开头，可以是二合一链接、长链接、短链接等各种淘宝高佣链接；支持渠道备案链接。* 该参数需要进行Urlencode编码后传入*
 * @method  setLogo(string $value) 口令弹框logoURL
 * @method  setUserId(string $value) 生成口令的淘宝用户ID，非必传参数
 */
class CreatTaokoulingReq extends Request
{
    public $affiliation = 'basic';

    protected $address = "tb-service/creat-taokouling";

    protected $version = 'v1.0.0';

    protected $checkParams = [];

    protected $cacheTime = 60;

    public function __call($name, $arguments)
    {
        $this->params[$name] = $arguments[0];
        return $this;
    }
}