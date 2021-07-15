<?php

namespace Botble\Manage\Providers;

use Botble\Manage\Models\Manage;
use Illuminate\Support\ServiceProvider;
use Botble\Manage\Repositories\Caches\ManageCacheDecorator;
use Botble\Manage\Repositories\Eloquent\ManageRepository;
use Botble\Manage\Repositories\Interfaces\ManageInterface;
use Botble\Base\Supports\Helper;
use Event;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;
use Language;
use SeoHelper;
use SlugHelper;

class ManageServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    public function register()
    {
        $this->app->bind(ManageInterface::class, function () {
            return new ManageCacheDecorator(new ManageRepository(new Manage));
        });

        $this->app->bind(\Botble\Manage\Repositories\Interfaces\DeaneryInterface::class, function () {
            return new \Botble\Manage\Repositories\Caches\DeaneryCacheDecorator(
                new \Botble\Manage\Repositories\Eloquent\DeaneryRepository(new \Botble\Manage\Models\Deanery)
            );
        });

        $this->app->bind(\Botble\Manage\Repositories\Interfaces\PriestInterface::class, function () {
            return new \Botble\Manage\Repositories\Caches\PriestCacheDecorator(
                new \Botble\Manage\Repositories\Eloquent\PriestRepository(new \Botble\Manage\Models\Priest)
            );
        });

        $this->app->bind(\Botble\Manage\Repositories\Interfaces\ParishInterface::class, function () {
            return new \Botble\Manage\Repositories\Caches\ParishCacheDecorator(
                new \Botble\Manage\Repositories\Eloquent\ParishRepository(new \Botble\Manage\Models\Parish)
            );
        });

        $this->app->bind(\Botble\Manage\Repositories\Interfaces\HistoryInterface::class, function () {
            return new \Botble\Manage\Repositories\Caches\HistoryCacheDecorator(
                new \Botble\Manage\Repositories\Eloquent\HistoryRepository(new \Botble\Manage\Models\History)
            );
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/manage')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
                \Language::registerModule([Manage::class]);
                \Language::registerModule([\Botble\Manage\Models\Deanery::class]);
                \Language::registerModule([\Botble\Manage\Models\Priest::class]);
                \Language::registerModule([\Botble\Manage\Models\Parish::class]);
                \Language::registerModule([\Botble\Manage\Models\History::class]);
            }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-manage',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/manage::manage.name',
                'icon'        => 'fa fa-list',
                'url'         => route('manage.index'),
                'permissions' => ['manage.index'],
            ]);

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-deanery',
                'priority'    => 0,
                'parent_id'   => 'cms-plugins-manage',
                'name'        => 'plugins/manage::deanery.name',
                'icon'        => null,
                'url'         => route('deanery.index'),
                'permissions' => ['deanery.index'],
            ]);

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-priest',
                'priority'    => 0,
                'parent_id'   => 'cms-plugins-manage',
                'name'        => 'plugins/manage::priest.name',
                'icon'        => null,
                'url'         => route('priest.index'),
                'permissions' => ['priest.index'],
            ]);

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-parish',
                'priority'    => 0,
                'parent_id'   => 'cms-plugins-manage',
                'name'        => 'plugins/manage::parish.name',
                'icon'        => null,
                'url'         => route('parish.index'),
                'permissions' => ['parish.index'],
            ]);

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-history',
                'priority'    => 0,
                'parent_id'   => 'cms-plugins-manage',
                'name'        => 'plugins/manage::history.name',
                'icon'        => null,
                'url'         => route('history.index'),
                'permissions' => ['history.index'],
            ]);
        });

        //add slug
        $this->app->booted(function () {
           \SlugHelper::registerModule(Deanery::class);
           \SlugHelper::setPrefix(Deanery::class, 'deanery');
           \SlugHelper::registerModule(Priest::class);
           \SlugHelper::setPrefix(Priest::class, 'priest');
           \SlugHelper::registerModule(Parish::class);
           \SlugHelper::setPrefix(Parish::class, 'parish');
           \SlugHelper::registerModule(History::class);
           \SlugHelper::setPrefix(History::class, 'history');
        });
    }
}
