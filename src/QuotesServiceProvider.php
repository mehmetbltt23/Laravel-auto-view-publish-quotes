<?php

namespace Quotes;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Quotes\Console\InstallConsole;

class QuotesServiceProvider extends ServiceProvider
{
    /**
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot()
    {
        $this->registerPublishing();
        $this->registerViewShareData();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/quotes.php', 'quotes');
    }

    protected function registerPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/quotes.php' => config_path('quotes.php'),
            ], 'quotes-config');

            $this->commands([
                InstallConsole::class
            ]);
        }
    }

    protected function registerViewShareData() {
        if (!$this->app->runningInConsole()) {
            $view_factory = $this->app->make(Factory::class);
            $view_factory->composer('*', function ($view) {
                $request = $this->app->make(Request::class);
                $view_data = (new FindQuoteService($request->path() ?? ''))->boot();
                $view->with('page', $view_data);
            });
        }
    }
}
