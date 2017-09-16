<?php

namespace Clarkeash\Converter\Metrics;

use Clarkeash\Converter\Contracts\Metric;

class Time implements Metric
{
    public function seconds()
    {
        return 1;
    }

    public function minutes()
    {
        return 60;
    }

    public function hours()
    {
        return 60 * $this->minutes();
    }

    public function days()
    {
        return 24 * $this->hours();
    }

    public function weeks()
    {
        return 7 * $this->days();
    }

    public function fortnights()
    {
        return 2 * $this->weeks();
    }

    public function months()
    {
        return 30 * $this->days();
    }

    public function years()
    {
        return 365 * $this->days();
    }

    public function leapyears()
    {
        return 366 * $this->days();
    }

    public function decades()
    {
        return 10 * $this->years();
    }

    public function jubilees()
    {
        return 50 * $this->years();
    }

    public function centuries()
    {
        return 100 * $this->years();
    }

    public function millenniums()
    {
        return 1000 * $this->years();
    }
}
