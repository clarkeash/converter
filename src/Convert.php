<?php

namespace Clarkeash\Converter;

use Clarkeash\Converter\Exceptions\BadMethodCallException;
use Clarkeash\Converter\Metrics\Size;
use Clarkeash\Converter\Metrics\Time;

class Convert
{
    /**
     * @var array
     */
    protected static $metrics = [
        'size' => Size::class,
        'time' => Time::class,
    ];

    /**
     * @var int
     */
    protected $value = 0;

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @param $method
     * @param $args
     *
     * @return mixed
     */
    public function __call($method, $args)
    {
        if (array_key_exists($method, static::$metrics)) {

            $metric = new static::$metrics[$method];

            return new From($this, $metric);
        }

        BadMethodCallException::throw($method, $this);
    }

    /**
     * Proxy to __call
     *
     * @param $method
     * @param $args
     *
     * @return \Clarkeash\Converter\From
     */
    public static function __callStatic($method, $args)
    {
        $convert = new static;

        return call_user_func([$convert, $method]);
    }
}
