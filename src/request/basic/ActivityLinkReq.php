<?php

namespace DTK\request\basic;

use DTK\request\Request;

/**
 * 官方活动会场转链
 *
 * 应用场景：如果对接了官方活动接口，可以通过会场转链接口将活动所有商品进行批量转链，便于快速推广
 *
 * 接口说明：此接口将官方活动商品批量转链
 *
 * Class ActivityLinkReq
 * @package DTK\request\basic
 *
 * @method  setPromotionSceneId(string $value) 联盟官方活动ID，从联盟官方活动页获取或从大淘客官方活动推广接口获取
 * @method  setPid(string $value) 推广pid，默认为在”我的应用“添加的pid
 * @method  setRelationId(string $value) 渠道id将会和传入的pid进行验证，验证通过将正常转链，请确认填入的渠道id是正确的
 * @method  setUnionId(string $value) 自定义输入串，英文和数字组成，长度不能大于12个字符，区分不同的推广渠道
 */
class ActivityLinkReq extends Request
{
    public $affiliation = 'basic';

    protected $address = "tb-service/activity-link";

    protected $version = 'v1.0.0';

    protected $checkParams = ['promotionSceneId'];

    protected $cacheTime = 60;

    public function __call($name, $arguments)
    {
        $this->params[$name] = $arguments[0];
        return $this;
    }
}