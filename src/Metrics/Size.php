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

    public function kilobits()
    {
        return pow(1000, 1);
    }

    public function kibibits()
    {
        return pow(1024, 1);
    }

    public function kilobytes()
    {
        return $this->bytes() * $this->kilobits();
    }

    public function kibibytes()
    {
        return $this->bytes() * $this->kibibits();
    }

    public function megabits()
    {
        return pow(1000, 2);
    }

    public function mebibits()
    {
        return pow(1024, 2);
    }

    public function megabytes()
    {
        return $this->bytes() * $this->megabits();
    }

    public function mebibytes()
    {
        return $this->bytes() * $this->mebibits();
    }

    public function gigabits()
    {
        return pow(1000, 3);
    }

    public function gibibits()
    {
        return pow(1024, 3);
    }

    public function gigabytes()
    {
        return $this->bytes() * $this->gigabits();
    }

    public function gibibytes()
    {
        return $this->bytes() * $this->gibibits();
    }

    public function terabits()
    {
        return pow(1000, 4);
    }

    public function tebibits()
    {
        return pow(1024, 4);
    }

    public function terabytes()
    {
        return $this->bytes() * $this->terabits();
    }

    public function tebibytes()
    {
        return $this->bytes() * $this->tebibits();
    }

    public function petabits()
    {
        return pow(1000, 5);
    }

    public function pebibits()
    {
        return pow(1024, 5);
    }

    public function petabytes()
    {
        return $this->bytes() * $this->petabits();
    }

    public function pebibytes()
    {
        return $this->bytes() * $this->pebibits();
    }

    public function exabits()
    {
        return pow(1000, 6);
    }

    public function exbibits()
    {
        return pow(1024, 6);
    }

    public function exabytes()
    {
        return $this->bytes() * $this->exabits();
    }

    public function exbibytes()
    {
        return $this->bytes() * $this->exbibits();
    }

    public function zettabits()
    {
        return pow(1000, 7);
    }

    public function zebibits()
    {
        return pow(1024, 7);
    }

    public function zettabytes()
    {
        return $this->bytes() * $this->zettabits();
    }

    public function zebibytes()
    {
        return $this->bytes() * $this->zebibits();
    }

    public function yottabits()
    {
        return pow(1000, 8);
    }

    public function yobibits()
    {
        return pow(1024, 8);
    }

    public function yottabytes()
    {
        return $this->bytes() * $this->yottabits();
    }

    public function yobibytes()
    {
        return $this->bytes() * $this->yobibits();
    }
}
