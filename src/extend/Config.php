<?php


namespace DTK\extend;

/**
 * 配置
 * Class Config
 * @package DTK\extend
 */
class Config extends \DTK\Config
{

    public static function get($name)
    {
        return self::$default[$name] ?? '';
    }

    public static function set($name, $value)
    {
        self::$default[$name] = $value;
    }

}