<?php

namespace Clarkeash\Converter;

use Clarkeash\Converter\Contracts\Metric;
use Clarkeash\Converter\Exceptions\BadMethodCallException;

class Add
{
    /**
     * @var \Clarkeash\Converter\Convert
     */
    private $convert;

    /**
     * @var \Clarkeash\Converter\Contracts\Metric
     */
    private $metric;

    /**
     * @var int
     */
    private $value = 0;

    /**
     * Add constructor.
     *
     * @param \Clarkeash\Converter\Convert          $convert
     * @param \Clarkeash\Converter\Contracts\Metric $metric
     * @param                                       $value
     */
    public function __construct(Convert $convert, Metric $metric, $value)
    {
        $this->convert = $convert;
        $this->metric = $metric;
        $this->value = $value;
    }

    public function __call($method, $args)
    {
        if (method_exists($this->metric, $method)) {
            $rate = call_user_func([$this->metric, $method]);

            $temp = $rate * $this->value;

            $this->convert->setValue($temp + $this->convert->getValue());

            return new To($this->convert, $this->metric);
        }

        BadMethodCallException::throw($method, $this->metric, $this);
    }
}
