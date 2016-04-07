<?php

use Illuminate\Database\Seeder;

class AddTestModules extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
            [
                'name' => 'TestModuleA',
                'label' => 'Test Module A',
                'active' => 1
            ]
        ]);
    }
}
