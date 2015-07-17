<?php

namespace Appsketch\Adfly\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Adfly
 *
 * @package M44rt3np44uw\Adfly\Facades
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