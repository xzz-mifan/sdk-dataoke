<?php


namespace DTK;


/**
 * 默认配置信息
 * Class Config
 * @package DTK
 */
class Config
{
    /**
     * 默认配置
     * @var array
     */
    static $default = [
        'appKey'         => '5daff4797f740', // 默认大淘客appKey
        'appSecret'      => 'd9ec11c0a45f0213b68ed72a85790eb6', // 默认大淘客appSecret
        'cacheDirectory' => './temp/DOFileCacheStorage/', // 缓存默认路径 需要自己配置
        'cachetime'      => 300,
    ];
}