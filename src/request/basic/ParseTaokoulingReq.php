<?php

namespace DTK\request\basic;

use DTK\request\Request;

/**
 * 淘口令解析
 *
 * 应用场景：将首单活动礼金商品作为营销专区，用于吸引粉丝，提升活跃和转化
 *
 * 接口说明：该接口返回大淘客首单礼金的商品列表，礼金金额为预估金额，随账号、领取时间变动。
 *
 * Class ParseTaokoulingReq
 * @package DTK\request\basic
 *
 * @method  setContent(string $value) 包含淘口令的文本。 若文本中有多个淘口令，仅解析第一个。（目前仅支持商品口令和二合一券口令）
 */
class ParseTaokoulingReq extends Request
{
    public $affiliation = 'basic';

    protected $address = "tb-service/parse-taokouling";

    protected $version = 'v1.0.0';

    protected $checkParams = ['content'];

    protected $cacheTime = 60;

    public function __call($name, $arguments)
    {
        $this->params[$name] = $arguments[0];
        return $this;
    }
}