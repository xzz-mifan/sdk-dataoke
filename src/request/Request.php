<?php

namespace DTK\request;

class Request
{
    protected $address;


    protected $version = 'v1.2.2';

    /**
     * 获取当前API版本
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * 设置版本号默认为最新
     * @param $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    protected $params = [];

    /**
     * 获取请求参数
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * 设置请求参数
     * @param array $params
     * @return $this
     */
    public function setParams(array $params)
    {
        $this->params = array_merge($this->params, $params);
        return $this;
    }
}