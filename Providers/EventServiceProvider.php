<?php

namespace Modules\Core\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Core\Events\MenuWasCreated;
use Modules\Core\Listeners\AddMenuItems;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        MenuWasCreated::class => [
            AddMenuItems::class
        ]
    ];
}
