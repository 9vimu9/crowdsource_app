<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CrowdSourceUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'crowd_source_user',
            'email' => 'crowd_source_user@mail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
