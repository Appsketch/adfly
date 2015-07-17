<?php

namespace Appsketch\Adfly\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Adfly
 *
 * @package Appsketch\Adfly\Facades
 */
class Adfly extends Facade {

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Appsketch\Adfly\Adfly';
    }

}