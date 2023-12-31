<?php

namespace Vietstars\ClientDetect\Facades;

use Illuminate\Support\Facades\Facade;

class Client extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'client';
    }
}
