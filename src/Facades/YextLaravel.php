<?php


namespace KevinEm\YextLaravel\Facades;


use Illuminate\Support\Facades\Facade;

class YextLaravel extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
    {
        return 'yext-laravel';
    }
}