<?php

namespace Chouhai2018\ShowRouter;

use Illuminate\Support\ServiceProvider;

class ShowRouterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/showrouter.php';

        $this->publishes([
            $configPath => config_path('chouhai2018/showrouter.php'),
        ]);

        $migrationPath = __DIR__ . '/../stubs/migration.stub';
        $fileName = date('Y_m_d_His') . '_' . 'create_api_calls_count_table.php';

        $this->publishes([
            $migrationPath => database_path('migrations/' . $fileName),
        ], 'migrations');

        $viewPath = __DIR__ . '/../views/showrouter.blade.php';

        $this->publishes([
            $viewPath => resource_path('views/routes/showrouter.blade.php'),
        ], 'views');

        $this->loadViewsFrom(__DIR__ . '/../views', 'chouhai2018');

        if (config('chouhai2018.showrouter.showrouter')) {
            $this->app['router']->get(
                config('chouhai2018.showrouter.route'),
                "\\Chouhai2018\\ShowRouter\\ShowRouter@showRoutes"
            );
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}