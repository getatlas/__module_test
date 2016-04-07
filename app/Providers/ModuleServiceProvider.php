<?php

namespace App\Providers;

use App\Contracts\ModuleContract;
use App\Exceptions\ModuleException;
use App\Module;
use App\Modules\TestModuleA;
use App\Modules\TestModuleB;
use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * @var ModuleContract[]
     */
    protected $modules = [
//        TestModuleA\Module::class,
//        TestModuleB\Module::class,
    ];

    /**
     * Bootstrap any application services.
     *
     * @throws ModuleException
     */
    public function boot()
    {
        foreach ($this->modules as $module) {
            $is_module = Module::where('name', $module->name)->first();
            if ($is_module) {
                if ($is_module->active) {
                    $module->routes();
                } else {

                }
            } else {
                throw new ModuleException("Module {$module->name} has not been initialised.");
            }
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->modules as &$module) {
            $module = (new $module);
        }
    }
}
