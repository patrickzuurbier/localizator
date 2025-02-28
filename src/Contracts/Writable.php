<?php

namespace PatrickZuurbier\Localizator\Contracts;

/**
 * Interface Writable
 * @package PatrickZuurbier\Localizator\Contracts
 */
interface Writable
{
    /**
     * @param string $locale
     * @param Translatable $keys
     */
    public function put(string $locale, Translatable $keys): void;
}
