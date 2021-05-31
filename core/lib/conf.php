<?php
/**
 * Created by PhpStorm.
 * User: chuyuejun
 * Date: 2018/6/8
 * Time: 16:46
 * 加载配置类
 */
namespace core\lib;

class conf
{
    static public $conf = array();

    static public function get($name, $file)
    {
        /**
         * 1.判断配置文件是否存在
         * 2.判断配置是否存在
         * 3.缓存配置
         */
        if (isset(self::$conf[$file])) {
            return self::$conf[$file][$name];
        } else {
            $path = PHPTEST . './core/config/' . $file . '.php';
            if (is_file($path)) {
                $conf = include $path;
                if (isset($conf[$name])) {
                    self::$conf[$file] = $conf;
                    return $conf[$name];
                } else {
                    throw new \Exception('没有这个配置项' . $name);
                }
            } else {
                throw new \Exception('找不到配置文件' . $file);
            }
        }
    }

    /**
     * 获取配置文件
     * @param $file
     * @return mixed
     * @throws \Exception
     */
    public static function all($file)
    {
        $file_all = explode('.', $file);
        $file = array_shift($file_all);
        if (isset(self::$conf[$file])) {
            if (count($file_all)) {
                return self::getConfig(self::$conf[$file], $file_all);
            }
            return self::$conf[$file];
        } else {
            $path = PHPTEST . './core/config/' . $file . '.php';
            if (is_file($path)) {
                self::$conf[$file] = include $path;
                if (count($file_all)) {
                    return self::getConfig(self::$conf[$file], $file_all);
                }
                return self::$conf[$file];
            } else {
                throw new \Exception('找不到配置文件' . $file);
            }
        }
    }

    /**
     * @param array $value
     * @param array $key
     */
    public static function getConfig(array $value, array $keys)
    {
        try {
            $val = '';
            foreach ($keys as $k => $v) {
                if ($k == 0) {
                    $val = $value[$v];
                } else {
                    $val = $val[$v];
                }
            }
            return $val;
        } catch (\Exception $e) {
            return '';
        }
    }















}