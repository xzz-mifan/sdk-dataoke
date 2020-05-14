<?php


namespace DTK\extend;


use DTK\vendor\cache\DOFileCache;

/**
 * 缓存
 * Class Cache
 * @package DTK\extend
 */
class Cache
{

    /**
     * 实例化
     * @return DOFileCache
     */
    public static function instance()
    {
        $cache = new DOFileCache();

        $cache->changeConfig([
            'cacheDirectory' => Config::get('cacheDirectory'),
        ]);

        return $cache;
    }

    /**
     * 获取缓存
     * @param $key
     * @return bool|mixed
     * @throws \Exception
     */
    public static function get($key)
    {
        return self::instance()->get($key);
    }

    /**
     * 设置缓存
     * @param $key
     * @param $value
     * @param int $expiry
     */
    public static function set($key, $value, $expiry = 0)
    {
        self::instance()->set($key, $value, $expiry);
    }

    /**
     * 删除缓存
     * @param $key
     */
    public static function delete($key)
    {
        self::instance()->delete($key);
    }

}