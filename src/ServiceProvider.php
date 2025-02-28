<?php

namespace PatrickZuurbier\Localizator;

use PatrickZuurbier\Localizator\Console\LocalizeCommand;
use PatrickZuurbier\Localizator\Services\Collectors\DefaultKeyCollector;
use PatrickZuurbier\Localizator\Services\Collectors\JsonKeyCollector;
use PatrickZuurbier\Localizator\Services\FileFinder;
use PatrickZuurbier\Localizator\Services\Localizator;
use PatrickZuurbier\Localizator\Services\Parser;
use PatrickZuurbier\Localizator\Services\Writers\DefaultWriter;
use PatrickZuurbier\Localizator\Services\Writers\JsonWriter;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Class ServiceProvider
 * @package PatrickZuurbier\Localizator
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/localizator.php' => config_path('localizator.php'),
            ], 'config');

            $this->commands(LocalizeCommand::class);
        }
    }

    /**
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/localizator.php', 'localizator');

        $this->registerContainerClasses();
    }

    /**
     * @return void
     */
    private function registerContainerClasses(): void
    {
        $this->app->singleton('localizator', Localizator::class);

        $this->app->singleton('localizator.finder', function ($app) {
            return new FileFinder($app['config']['localizator']);
        });

        $this->app->singleton('localizator.parser', function ($app) {
            return new Parser($app['config']['localizator']);
        });

        $this->app->bind('localizator.writers.default', DefaultWriter::class);
        $this->app->bind('localizator.writers.json', JsonWriter::class);

        $this->app->bind('localizator.collector.default', DefaultKeyCollector::class);
        $this->app->bind('localizator.collector.json', JsonKeyCollector::class);
    }
}
