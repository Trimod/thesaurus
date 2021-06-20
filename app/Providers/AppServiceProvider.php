<?php

namespace App\Providers;

use App\Helpers\ThesaurusManager;
use App\Interfaces\Thesaurus;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Thesaurus::class, ThesaurusManager::class);
    }
}
