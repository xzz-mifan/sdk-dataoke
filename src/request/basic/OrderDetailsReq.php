<?php

namespace DTK\request\basic;

use DTK\request\Request;

/**
 * 订单查询接口
 *
 * 应用场景：可用于代理，返利平台快速查询某短时间内所有订单，便于区分下级代理分佣或会员返利。 以保障每一位代理或者会员权益。
 *
 * 接口说明：接口返回用户某段时间内的所有订单，实时掌握订单数据。如果满足添加前三天高效转链接口有调用的条件，请在当天的九点以后添加订单接口。（注：高效转链接口需连续3天有调用，中途不能中断）
 *
 * Class OrderDetailsReq
 * @package DTK\request\basic
 *
 * @method  setQueryType(string $value) 查询时间类型，1：按照订单淘客创建时间查询，2:按照订单淘客付款时间查询，3:按照订单淘客结算时间查询
 * @method  setPositionIndex(string $value) 位点，除第一页之外，都需要传递；前端原样返回。
 * @method  setPageSize(string $value) 页大小，默认20，1~100
 * @method  setMemberType(string $value) 推广者角色类型, 2:二方，3:三方，不传，表示所有角色
 * @method  setTkStatus(string $value) 淘客订单状态，12-付款，13-关闭，14-确认收货，3-结算成功, 不传，表示所有状态
 * @method  setEndTime(string $value) 订单查询结束时间，订单开始时间至订单结束时间，中间时间段日常要求不超过3个小时，但如618、双11、年货节等大促期间预估时间段不可超过20分钟，超过会提示错误，调用时请务必注意时间段的选择，以保证亲能正常调用！ 时间格式：YYYY-MM-DD HH:MM:SS
 * @method  setStartTime(string $value) 订单查询开始时间。时间格式：YYYY-MM-DD HH:MM:SS
 * @method  setJumpType(string $value) 跳转类型，当向前或者向后翻页必须提供, -1: 向前翻页, 1：向后翻页
 * @method  setPageNo(string $value) 第几页，默认1，1~100
 * @method  setOrderScene(string $value) 场景订单场景类型，1:常规订单，2:渠道订单，3:会员运营订单，默认为1
 */
class OrderDetailsReq extends Request
{
    public $affiliation = 'basic';

    protected $address = "tb-service/get-order-details";

    protected $version = 'v1.0.0';

    protected $checkParams = ['startTime', 'endTime'];

    protected $cacheTime = 60;

    public function __call($name, $arguments)
    {
        $this->params[$name] = $arguments[0];
        return $this;
    }
}