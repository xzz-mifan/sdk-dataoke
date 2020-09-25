<?php

namespace DTK\request\basic;

use DTK\request\Request;

/**
 * 淘口令转淘口令
 *
 * 应用场景：当用户从其他渠道采集到商品口令，想要自己推广，可以将此转为自己的淘口令
 *
 * 接口说明：此接口将其他人的口令解析后，再转化为自己的口令。
 *
 * Class TwdToTwdReq
 * @package DTK\request\basic
 *
 * @method  setContent(string $value) 支持包含文本的淘口令，但最好是一个单独淘口令
 * @method  setPid(string $value) 推广位ID，用户可自由填写当前大淘客账号下已授权淘宝账号的任一pid，若未填写，则默认使用创建应用时绑定的pid
 * @method  setChannelId(string $value) 渠道id将会和传入的pid进行验证，验证通过将正常转链，请确认填入的渠道id是正确的
 * @method  setSpecial_id(string $value) 会员运营ID
 * @method  setExternal_id(string $value) 淘宝客外部用户标记，如自身系统账户ID；微信ID等
 */
class TwdToTwdReq extends Request
{
    public $affiliation = 'basic';

    protected $address = "tb-service/twd-to-twd";

    protected $version = 'v1.0.0';

    protected $checkParams = ['content'];

    protected $cacheTime = 60;

    public function __call($name, $arguments)
    {
        $this->params[$name] = $arguments[0];
        return $this;
    }
}