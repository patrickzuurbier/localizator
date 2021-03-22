<?php

namespace PatrickZuurbier\Localizator\Services\Collectors;

use PatrickZuurbier\Localizator\Collections\JsonKeyCollection;
use PatrickZuurbier\Localizator\Contracts\Collectable;
use Illuminate\Support\Collection;

/**
 * Class JsonKeyCollector
 * @package PatrickZuurbier\Localizator\Services\Collectors
 */
class JsonKeyCollector implements Collectable
{
    /**
     * @param string $locale
     * @return Collection
     */
    public function getTranslated(string $locale): Collection
    {
        $file = resource_path('lang' . DIRECTORY_SEPARATOR . "{$locale}.json");

        if (! file_exists($file)) {
            return new JsonKeyCollection;
        }

        return new JsonKeyCollection(
            json_decode(file_get_contents($file), true)
        );
    }
}
