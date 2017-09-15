<?php

namespace Clarkeash\Converter;

use BadMethodCallException;
use Clarkeash\Converter\Metrics\Size;

class Convert
{
    /**
     * @var array
     */
    protected static $metrics = [
        'size' => Size::class
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

        throw new BadMethodCallException(sprintf('Method: %s does not exist on class: %s', $method, get_class($this)));
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
