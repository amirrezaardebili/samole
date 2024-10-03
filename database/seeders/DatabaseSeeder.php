<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User_Attributes;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $max = 40000;
        $this->command->getOutput()->progressStart($max);
        for ($i = 1; $i <= $max; $i++) {
            User::factory(1)->create()->each(function ($user) {
                $user->attributes()->saveMany(User_Attributes::factory(1)->make());
                $this->command->getOutput()->progressAdvance();
            });
        }
        $this->command->getOutput()->progressFinish();
    }
}
