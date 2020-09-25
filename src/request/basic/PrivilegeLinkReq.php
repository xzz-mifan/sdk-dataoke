<?php

namespace DTK\request\basic;

use DTK\request\Request;

/**
 * 高效转链
 * Class PrivilegeLinkReq
 * @package DTK\request\basic
 *
 * @method  setGoodsId(string $value) 淘宝商品id 必须:是
 * @method  setCouponId(string $value) 商品的优惠券ID，一个商品在联盟可能有多个优惠券，可通过填写该参数的方式选择使用的优惠券，请确认优惠券ID正确，否则无法正常跳转
 * @method  setPid(string $value) 推广位ID，用户可自由填写当前大淘客账号下已授权淘宝账号的任一pid，若未填写，则默认使用创建应用时绑定的pid
 * @method  setChannelId(string $value) 渠道id将会和传入的pid进行验证，验证通过将正常转链，请确认填入的渠道id是正确的
 * @method  setRebateType(int $value) 付定返红包，0.不使用付定返红包，1.参与付定返红包
 */
class PrivilegeLinkReq extends Request
{
    public $affiliation = 'basic';

    protected $address = "tb-service/get-privilege-link";

    protected $version = 'v1.1.1';

    protected $checkParams = ['goodsId'];

    protected $cacheTime = 60;

    public function __call($name, $arguments)
    {
        $this->params[$name] = $arguments[0];
        return $this;
    }
}