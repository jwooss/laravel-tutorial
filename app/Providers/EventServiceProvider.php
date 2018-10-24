<?php

namespace App\Providers;

use App\Events\ArticleCreated;
use App\Events\ArticlesEvent;
use App\Listeners\ArticlesEventListener;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        ArticlesEvent::class => [
            ArticlesEventListener::class,
        ],
        Login::class => [
            \App\Listeners\UsersEventListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Event::listen(ArticleCreated::class, ArticlesEventListener::class);

    }
}
