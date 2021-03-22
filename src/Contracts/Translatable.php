<?php

namespace PatrickZuurbier\Localizator\Contracts;

use Illuminate\Support\Collection;

/**
 * Class Translatable
 * @package PatrickZuurbier\Localizator\Contracts
 */
abstract class Translatable extends Collection
{
    abstract public function sortAlphabetically(): Collection;
}
