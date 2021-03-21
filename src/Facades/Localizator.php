<?php

namespace PatrickZuurbier\Localizator\Facades;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * Class Localizator
 * @package PatrickZuurbier\Localizator\Facades
 *
 * @method static void localize(Collection $keys, string $type, string $locale)
 * @see \PatrickZuurbier\Localizator\Services\Localizator
 */
class Localizator extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'localizator';
    }
}
