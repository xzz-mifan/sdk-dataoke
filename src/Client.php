<?php

namespace DTK;

/**
 * 请求客户端
 * Class Client
 * @package DTK
 */
class Client
{
    private $_appKey;
    private $_appSecret;

    /**
     * Client constructor.
     * @param string $appKey
     * @param string $appSecret
     */
    public function __construct($appKey = '', $appSecret = '')
    {
        /* 此处可以设置默认值 方便调用 */
        $this->_appKey    = $appKey;
        $this->_appSecret = $appSecret;
    }

    /**
     * static 快捷调用
     * @param string $appKey
     * @param string $appSecret
     * @return self
     */
    public static function static($appKey = '', $appSecret = '')
    {
        /* 此处可以设置默认值 方便调用 */
        $class_name = static::class;
        return new $class_name($appKey, $appSecret);
    }

    /**
     * @param $name
     * @param $arguments
     * @return self
     */
    public function __call($name, $arguments)
    {
        $class_name = __NAMESPACE__ . "\\" . $name;
        return new $class_name($arguments);
    }
}