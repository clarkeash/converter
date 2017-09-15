<?php

namespace Clarkeash\Converter\Metrics;

use Clarkeash\Converter\Contracts\Metric;

class Size implements Metric
{
    public function bits()
    {
        return pow(2, 0);
    }

    public function nibbles()
    {
        return pow(2, 2);
    }

    public function bytes()
    {
        return pow(2, 3);
    }

    public function kibibytes()
    {
        return $this->bytes() * pow(1024, 1);
    }

    public function mebibytes()
    {
        return $this->bytes() * pow(1024, 2);
    }

    public function gibibytes()
    {
        return $this->bytes() * pow(1024, 3);
    }

    public function tebibytes()
    {
        return $this->bytes() * pow(1024, 4);
    }

    public function pebibytes()
    {
        return $this->bytes() * pow(1024, 5);
    }


    public function kilobytes()
    {
        return $this->bytes() * pow(1000, 1);
    }

    public function megabytes()
    {
        return $this->bytes() * pow(1000, 2);
    }

    public function gigabytes()
    {
        return $this->bytes() * pow(1000, 3);
    }

    public function terabytes()
    {
        return $this->bytes() * pow(1000, 4);
    }

    public function petabytes()
    {
        return $this->bytes() * pow(1000, 5);
    }
}
