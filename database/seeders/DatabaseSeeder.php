<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\admin::factory(1)->create();

        \App\Models\admin::factory()->create([
            'name' => 'jeff Johnson',
            'email' => 'jeffjohnson@gmail.com',
        ]);
        \App\Models\manager::factory()->create([
            'name' => 'jeff Johnson',
            'email' => 'jeffjohnson@gmail.com',
        ]);
    }
}
