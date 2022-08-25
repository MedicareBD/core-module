<?php

namespace Modules\Core\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MenuWasCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $menu;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($menu)
    {
        $this->menu = $menu;
    }
}
