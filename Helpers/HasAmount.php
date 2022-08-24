<?php

namespace Modules\Core\Helpers;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasAmount
{
    protected function price(): Attribute
    {
        return $this->makeAmount();
    }

    protected function boxPrice(): Attribute
    {
        return $this->makeAmount();
    }

    protected function manufacturerPrice(): Attribute
    {
        return $this->makeAmount();
    }

    protected function startAmount(): Attribute
    {
        return $this->makeAmount();
    }

    protected function endAmount(): Attribute
    {
        return $this->makeAmount();
    }

    protected function makeAmount(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 100,
            set: fn ($value) => $value * 100,
        );
    }
}
