<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->admin()->create(['email' => 'localhost@localhost.com']);
        \App\Models\User::factory(5)->create();
        \App\Models\User::factory(5)->admin()->create();
    }
}
