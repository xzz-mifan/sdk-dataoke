<?php

namespace DTK\request\save;

use DTK\request\Request;

/**
 * 失效商品
 * Class StaleGoodsByTimeReq
 * @package DTK\request\save
 *
 * @method  setPageId(string $value) 分页Id 必须:是, 默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入口商品重复；示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）
 * @method  setPageSize(int $value) 每页数量, 默认为100，最大值200，若小于10，则按10条处理，每页条数仅支持输入10, 50, 100, 200
 * @method  setStartTime(string $value) 开始时间，默认为yyyy-mm-dd hh:mm:ss，商品下架的时间大于等于开始时间，开始时间需要在当日
 * @method  setEndTime(string $value) 结束时间，默认为请求的时间，商品下架的时间小于等于结束时间，结束时间需要在当日
 */
class StaleGoodsByTimeReq extends Request
{
    public $affiliation = 'save';

    protected $address = "goods/get-stale-goods-by-time";

    protected $version = "v1.0.1";

    protected $checkParams = ['pageId'];

    protected $cacheTime = 3600;

    public function __call($name, $arguments)
    {
        $this->params[$name] = $arguments[0];
        return $this;
    }
}