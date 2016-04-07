<?php namespace App\Modules\TestModuleB;

use App\Contracts\ModuleContract;

class Module implements ModuleContract
{

    public $name = 'TestModuleB';

    public function routes()
    {
        if (!app()->routesAreCached()) {
            require __DIR__ . '/Route.php';
        }
    }
}