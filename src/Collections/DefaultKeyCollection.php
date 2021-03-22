<?php

namespace PatrickZuurbier\Localizator\Collections;

use PatrickZuurbier\Localizator\Contracts\Translatable;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class DefaultKeyCollection extends Translatable
{
    /**
     * @return Collection
     */
    public function sortAlphabetically(): Collection
    {
        return $this->sortBy(function ($item, $key) {
            return $key;
        }, SORT_STRING);
    }

    /**
     * @param mixed $items
     * @return static
     */
    public function merge($items): DefaultKeyCollection
    {
        return parent::merge(Arr::dot($items));
    }
}
