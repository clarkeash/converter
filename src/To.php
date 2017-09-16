<?php

namespace Clarkeash\Converter;

use BadMethodCallException;
use Clarkeash\Converter\Contracts\Metric;

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

        if (method_exists($this->metric, $method)) {
            $rate = call_user_func([$this->metric, $method]);

            return $this->convert->getValue() / $rate;
        }

        throw new BadMethodCallException(sprintf('Method: %s does not exist on class: %s', $method, get_class($this->metric)));
    }
}
