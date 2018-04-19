<?php

namespace PandaAdmin\Laravel;

use Illuminate\Foundation\Application;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use PandaAdmin\Core\Config\Config;
use PandaAdmin\Core\Config\ConfigInterface;
use PandaAdmin\Core\Content\ContentTypeFactory;
use PandaAdmin\Core\Content\ContentTypeFactoryInterface;
use PandaAdmin\Core\Form\Fields\FieldFactory;
use PandaAdmin\Core\Form\Fields\FieldFactoryInterface;
use PandaAdmin\Core\Form\Fields\FieldMap;
use PandaAdmin\Core\Form\Fields\FieldMapInterface;
use PandaAdmin\Core\Form\FormFactory;
use PandaAdmin\Core\Form\FormFactoryInterface;
use PandaAdmin\Core\Storage\EntityManagerInterface;
use PandaAdmin\Laravel\Storage\EntityManager;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container
     *
     * @return void
     * @throws \InvalidArgumentException
     */
    public function register()
    {
        $this->app->singleton('admin.routes', function(Application $app) {
            /** @var Router $router */
            $router = $app->make(Router::class);

            $routes = $router->getRoutes()->getRoutesByName();

            $result = [];

            foreach ($routes as $name => $route) {
                /** @var Route $route */

                $result[$name] = $route->uri();
            }

            return $result;
        });

        $this->app->singleton(ConfigInterface::class, function(Application $app) {
            return new Config(config('panda-admin.contenttypes'));
        });

        $this->app->bind(ContentTypeFactoryInterface::class, function(Application $app) {
            /** @var ConfigInterface $config */
            $config = $app->make(ConfigInterface::class);

            return new ContentTypeFactory($config);
        });

        $this->app->bind(FieldMapInterface::class, function(Application $app) {
            return new FieldMap();
        });

        $this->app->bind(FieldFactoryInterface::class, function(Application $app) {
            $fieldMap = $app->make(FieldMapInterface::class);

            return new FieldFactory($fieldMap);
        });

        $this->app->bind(FormFactoryInterface::class, function(Application $app) {
            /** @var ContentTypeFactoryInterface $ctFactory */
            $ctFactory = $app->make(ContentTypeFactoryInterface::class);
            $fieldFactory = $app->make(FieldFactoryInterface::class);

            return new FormFactory($ctFactory, $fieldFactory);
        });

        $this->app->bind(EntityManagerInterface::class, function(Application $app) {
            return new EntityManager($app->make(ConfigInterface::class));
        });
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../dist' => public_path('vendor/panda-admin'),
            __DIR__ . '/../config/config.php' => config_path('panda-admin/config.php'),
            __DIR__ . '/../config/contenttypes.php' => config_path('panda-admin/contenttypes.php'),
        ], 'panda-admin');

        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'panda-admin');
    }
}