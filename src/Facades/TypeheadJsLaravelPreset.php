<?php

namespace Takielias\TypeheadJsLaravelPreset\Facades;

use Illuminate\Support\Facades\Facade;

class TypeheadJsLaravelPreset extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'typeheadjslaravelpreset';
    }
}
