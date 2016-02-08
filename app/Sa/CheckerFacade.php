<?php
namespace App\Sa;

use Illuminate\Support\Facades\Facade;

class CheckerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'checker';
    }
}
