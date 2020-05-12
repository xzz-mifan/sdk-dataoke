<?php

namespace DTK\request;


class Request
{
    protected $address;

    protected $checkParams = [];

    protected $version = 'v1.2.2';

    private $error = '';

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
}