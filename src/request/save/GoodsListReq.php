<?php

namespace DTK\request\save;

use DTK\request\Request;

/**
 * 商品列表
 * Class GoodsListReq
 * @package DTK\request\save
 */
class GoodsListReq extends Request
{
    protected $address = "goods/get-goods-list";

    /**
     * 分页Id
     * @param string $value (必须:是,默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入口商品重复；示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）)
     * @return $this
     */
    public function setPageId(string $value)
    {
        $this->params['pageId'] = $value;
        return $this;
    }

    /**
     * 每页条数
     * @param int $value (必须:否,默认为100，最大值200，若小于10，则按10条处理，每页条数仅支持输入10,50,100,200)
     * @return $this
     */
    public function setPageSize(int $value)
    {
        $this->params['pageSize'] = $value;
        return $this;
    }

    /**
     * 排序方式
     * @param int $value (必须:否,默认为0，0-综合排序，1-商品上架时间从高到低，2-销量从高到低，3-领券量从高到低，4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高)
     * @return $this
     */
    public function setSort(int $value)
    {
        $this->params['sort'] = $value;
        return $this;
    }

    /**
     * @param string $value (必须:否,大淘客的一级分类id，如果需要传多个，以英文逗号相隔，如：”1,2,3”。当一级类目id和二级类目id同时传入时，会自动忽略二级类目id)
     * @return $this
     */
    public function setCids(string $value)
    {
        $this->params['cids'] = $value;
        return $this;
    }

    public function setSubcid($value)
    {
        $this->params['subcid'] = $value;
        return $this;
    }

    public function setSpecialId($value)
    {
        return $this;
    }

    public function setJuHuaSuan($value)
    {
        return $this;
    }

    public function setTaoQiangGou($value)
    {
        return $this;
    }

    public function setTmall($value)
    {
        return $this;
    }

    public function setTchaoshi($value)
    {
        return $this;
    }

    public function setGoldSeller($value)
    {
        return $this;
    }

    public function setHaitao($value)
    {
        return $this;
    }

    public function setPre($value)
    {
        return $this;
    }

    public function setBrand($value)
    {
        return $this;
    }

    public function setPriceLowerLimit($value)
    {
        return $this;
    }

    public function setPriceUpperLimit($value)
    {
        return $this;
    }

    public function setCouponPriceLowerLimit($value)
    {
        return $this;
    }

    public function setCommissionRateLowerLimit($value)
    {
        return $this;
    }

    public function setMonthSalesLowerLimit($value)
    {
        return $this;
    }

    public function setFreeshipRemoteDistrict($value)
    {
        return $this;
    }


}