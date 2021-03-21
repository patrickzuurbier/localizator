<?php

namespace PatrickZuurbier\Localizator\Collections;

use PatrickZuurbier\Localizator\Contracts\Translatable;
use Illuminate\Support\Collection;

class JsonKeyCollection extends Translatable
{
    public function sortAlphabetically(): Collection
    {
        return $this->sortBy(function ($item, $key) {
            return $key;
        }, SORT_STRING);
    }
}
