<?php

namespace DTK;

use DTK\client\Save;
use DTK\extend\Cache;
use DTK\extend\Config;
use DTK\extend\Error;
use DTK\extend\Http;
use DTK\request\Request;

/**
 * 请求客户端
 * Class Client
 * @package DTK
 *
 * @method Save getGoodsList(Request $request) 商品列表
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
        if (!$appKey || !$appSecret) {
            $appKey    = Config::get('appKey');
            $appSecret = Config::get('appSecret');
        }
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

        $class_name_array = explode("\\", __CLASS__);
        $class_name       = strtolower($class_name_array[1]);
        $class_name       = __NAMESPACE__ . "\\" . $class_name . "\\" . $arguments[0]->affiliation;
        $class            = new $class_name($arguments);
        return call_user_method($name,$class);
        return new $class_name($arguments);
    }

    protected function run(Request $request)
    {

        $params = $request->getParams();
        if ($params === false) throw new \Exception($request->getError());

        /* 拼接参数 */
        $data['appKey']  = $this->_appKey;
        $data['version'] = $request->getVersion();
        $data            = array_merge($data, $params);
        $data['sign']    = $request->makeSign($data, $this->_appSecret);

        /* 缓存键 */
        $cacheKey = $request->getVersion() . ":" . md5($request->getAddress() . implode(',', $params));
        $result   = Cache::get($cacheKey);
        if ($result) return $result;

        $result = Http::get($request->getAddress(), $data);

        $data = json_decode($result, true);

        if (!$data || !isset($data['code'])) throw new \Exception(Error::$error['-100'], -100);


        if ($data['code'] != 0) throw new \Exception(Error::$error[$data['code']], $data['code']);

        Cache::set($cacheKey, $data['data'], $request->getCacheTime());

        return $data['data'];
    }
}