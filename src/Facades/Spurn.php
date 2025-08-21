<?php
namespace Dobesun\Jdsdk\Facades;

use Illuminate\Support\Facades\Facade;

class Spurn extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'spurn.jd.sdk';
    }
}
