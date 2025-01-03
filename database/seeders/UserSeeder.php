<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->name = $faker->name();
            $user->email = $faker->unique()->safeEmail();
            $user->password = Hash::make('password'); // Using a default password for all seeded users
            $user->save();
        }
    }
}
