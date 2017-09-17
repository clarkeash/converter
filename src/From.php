<?php

namespace Clarkeash\Converter;

use Clarkeash\Converter\Contracts\Metric;
use Clarkeash\Converter\Exceptions\BadMethodCallException;

class From
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

    public function __construct(Convert $convert, Metric $metric)
    {
        $this->convert = $convert;
        $this->metric = $metric;
    }

    public function __call($method, $args)
    {
        if (in_array($method, ['from', 'of'])) {
            $this->value = $args[0];
            return $this;
        }

        if (method_exists($this->metric, $method)) {
            $rate = call_user_func([$this->metric, $method]);

            $this->convert->setValue($rate * $this->value);

            return new To($this->convert, $this->metric);
        }

        BadMethodCallException::throw($method, $this->metric, $this);
    }
}
