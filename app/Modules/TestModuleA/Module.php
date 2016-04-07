<?php namespace App\Modules\TestModuleA;

use App\Contracts\ModuleContract;

class Module implements ModuleContract
{

    public $name = 'TestModuleA';

    public function routes()
    {
        if (!app()->routesAreCached()) {
            require __DIR__ . '/Route.php';
        }
    }
}