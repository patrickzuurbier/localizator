<?php

namespace PatrickZuurbier\Localizator\Services;

use PatrickZuurbier\Localizator\Contracts\Collectable;
use PatrickZuurbier\Localizator\Contracts\Translatable;
use PatrickZuurbier\Localizator\Contracts\Writable;

/**
 * Class Localizator
 * @package PatrickZuurbier\Localizator\Services
 */
class Localizator
{
    /**
     * @param Translatable $keys
     * @param string $type
     * @param $locale
     * @return void
     * @noinspection CallableParameterUseCaseInTypeContextInspection
     */
    public function localize(Translatable $keys, string $type, $locale): void
    {
        $translated = $this->getCollector($type)->getTranslated($locale);

        $keys = $keys
            ->merge($translated)
            ->when(config('localizator.sort'), function (Translatable $keyCollection) {
                return $keyCollection->sortAlphabetically();
            });

        $this->getWriter($type)->put($locale, $keys);
    }

    /**
     * @param string $type
     * @return Writable
     */
    protected function getWriter(string $type): Writable
    {
        return app("localizator.writers.$type");
    }

    /**
     * @param string $type
     * @return Collectable
     */
    protected function getCollector(string $type): Collectable
    {
        return app("localizator.collector.$type");
    }
}
