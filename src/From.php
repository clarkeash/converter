<?php

namespace Clarkeash\Converter;

use BadMethodCallException;
use Clarkeash\Converter\Contracts\Metric;

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

    /**
     * @param $value
     *
     * @return $this
     */
    public function from($value)
    {
        $this->value = $value;

        return $this;
    }

    public function __call($method, $args)
    {
        if (method_exists($this->metric, $method)) {
            $rate = call_user_func([$this->metric, $method]);

            $this->convert->setValue($rate * $this->value);

            return new To($this->convert, $this->metric);
        }

        throw new BadMethodCallException(sprintf('Method: %s does not exist on class: %s', $method, get_class($this->metric)));
    }
}
