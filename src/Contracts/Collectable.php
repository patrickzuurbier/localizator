<?php

namespace PatrickZuurbier\Localizator\Contracts;

use Illuminate\Support\Collection;

/**
 * Interface Collectable
 * @package PatrickZuurbier\Localizator\Contracts
 */
interface Collectable
{
    /**
     * @param string $locale
     * @return Collection
     */
    public function getTranslated(string $locale): Collection;
}
