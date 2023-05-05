<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Lesson;
use App\Models\Section;
use App\Models\Setting;
use App\Observers\LessonObserve;
use App\Observers\SectionObserver;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Section::observe(SectionObserver::class);
        Lesson::observe(LessonObserve::class);
        
        Blade::directive('routeIs', function ($expression) {
            return "<?php if(Request::url() == route($expression)): ?>";
        });

        $settings = /* Setting::first(); */ Cache::remember('settings', 60*60*24, function () {
            return Setting::first();
        });

        View::share('settings', $settings);
    }
}
