<?php
/**
 * Created by PhpStorm.
 * User: chuyuejun
 * Date: 2018/6/8
 * Time: 11:48
 */

/**
 * 打印数据
 * @param $val
 */
function var_p($val)
{
    if (is_bool($val)) {
        var_dump($val);
    } else if (is_null($val)) {
        var_dump(NULL);
    } else {
        echo "<pre style='position:relative;z-index:1000;padding:10px;
        border-radius:5px;background:#F5F5F5;border:1px solid #aaa;font-size:14px;
        line-height:18px;opacity:0.9;'>" . print_r($val, true) . "</pre>";
    }
    exit;
}

/**
 * @param $val
 * @param bool $is_die
 */
function echo_p($val, $is_die = true)
{
    if (is_string($val)) {
        echo $val;
        echo "\n";
    }
    if ($is_die === true) {
        exit;
    }
}

if (! function_exists('env')) {
    /**
     * Gets the value of an environment variable. Supports boolean, empty and null.
     *
     * @param  string|null  $key
     * @param  mixed  $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        $value = getenv($key);

        if ($value === false) {
            return value($default);
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;

            case 'false':
            case '(false)':
                return false;

            case 'empty':
            case '(empty)':
                return '';

            case 'null':
            case '(null)':
                return;
        }

        if (\core\support\Str::startsWith($value, '"') && \core\support\Str::endsWith($value, '"')) {
            return substr($value, 1, -1);
        }

        return $value;
    }
}

if (! function_exists('value')) {
    /**
     * Return the default value of the given value.
     *
     * @param  mixed  $value
     * @return mixed
     */
    function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}




















