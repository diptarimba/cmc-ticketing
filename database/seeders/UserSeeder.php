<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
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
        User::factory()->count(4)->state(new Sequence(
            ['email' => 'sekoin1@gmail.com'],
            ['email' => 'sekoin2@gmail.com'],
            ['email' => 'sekoin3@gmail.com'],
            ['email' => 'sekoin4@gmail.com']
        ))->create();
    }
}
