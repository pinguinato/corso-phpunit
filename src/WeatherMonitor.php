<?php

class WeatherMonitor
{
    /**
     * @var TemperatureService
     */
    protected $service;

    /**
     * WeatherMonitor constructor.
     * @param TemperatureService $service
     * @return void
     */
    public function __construct(TemperatureService $service)
    {
        $this->service = $service;
    }

    /**
     * @param $start
     * @param $end
     * @return int
     */
    public function getAverageTemperature($start, $end)
    {
        $startTemp = $this->service->getTemperature($start);
        $endTemp = $this->service->getTemperature($end);

        return ($startTemp + $endTemp) / 2;
    }
}
