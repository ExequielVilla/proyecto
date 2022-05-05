<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::factory(1)->create([
            'type'=>'admin'
        ]);
        \App\Models\Role::factory(1)->create([
            'type'=>'simple'
        ]);
        \App\Models\User::factory(100)->create();
        
    }
}
