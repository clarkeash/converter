<?php

namespace Clarkeash\Converter;

use Clarkeash\Converter\Contracts\Metric;
use Clarkeash\Converter\Exceptions\BadMethodCallException;

class To
{
    /**
     * @var \Clarkeash\Converter\Convert
     */
    private $convert;

    /**
     * @var \Clarkeash\Converter\Contracts\Metric
     */
    private $metric;

    public function __construct(Convert $convert, Metric $metric)
    {
        $this->convert = $convert;
        $this->metric = $metric;
    }

    public function __call($method, $args)
    {
        if (in_array($method, ['to', 'in', 'into', 'as'])) {
            return $this;
        }

        if ($method == 'and') {
            return new Add($this->convert, $this->metric, $args[0]);
        }

        if (method_exists($this->metric, $method)) {
            $rate = call_user_func([$this->metric, $method]);

            return $this->convert->getValue() / $rate;
        }

        BadMethodCallException::throw($method, $this->metric, $this);
    }
}
