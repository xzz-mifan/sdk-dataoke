<?php

namespace DTK\request;


use DTK\extend\Config;

class Request
{
    /* 请求地址 */
    protected $address;

    /* 需要检测的必填字段 */
    protected $checkParams = [];

    protected $version = 'v1.2.2';

    private $error = '';

    /* 缓存时间 (秒)*/
    protected $cacheTime = null;

    public $affiliation = 'save';

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
     * @return array|bool
     */
    public function getParams()
    {

        if (count($this->params) == 0 && count($this->checkParams) > 0) {
            $this->error = "必填参数不能为空:" . implode(',', $this->checkParams);
            return false;
        }

        foreach ($this->params as $index => $param) {
            if (stripos($index, 'set') === 0) {
                $req_index                = lcfirst(substr($index, 3));
                $this->params[$req_index] = $this->params[$index];
                unset($this->params[$index]);

                if (!in_array($req_index, $this->checkParams)) {
                    $this->error = "必填参数不能为空:" . implode(',', $this->checkParams);
                    return false;
                }
            }
        }
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

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return "https://openapi.dataoke.com/api/{$this->address}";
    }

    /**
     * 参数加密
     * @param $data
     * @param $appSecret
     * @return string
     */
    public function makeSign($data, $appSecret)
    {
        ksort($data);
        $str = '';
        foreach ($data as $k => $v) {

            $str .= '&' . $k . '=' . $v;
        }
        $str = trim($str, '&');
        return strtoupper(md5($str . '&key=' . $appSecret));
    }

    /**
     * @return null
     */
    public function getCacheTime()
    {
        if ($this->cacheTime == null || !$this->cacheTime) $this->cacheTime = Config::get('cachetime');
        return $this->cacheTime;
    }

    /**
     * @param $cacheTime
     * @return $this
     */
    public function setCacheTime($cacheTime)
    {
        $this->cacheTime = $cacheTime;
        return $this;
    }
}