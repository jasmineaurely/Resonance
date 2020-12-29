<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\Match\Entities\MatchFinish;
use Modules\Match\Entities\MatchStatus;
use Modules\Role\Entities\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Role::create([
            'name' => 'Administrator'
        ]);
        Role::create([
            'name' => 'Member'
        ]);

        User::create([
            'name' => 'Admin',
            'last_name' => 'Last',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 1
        ]);
        User::create([
            'name' => 'Member',
            'last_name' => 'Last',
            'email' => 'member@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 1
        ]);

        MatchStatus::create([
            'name' => 'Upcoming'
        ]);
        MatchStatus::create([
            'name' => 'Live'
        ]);
        MatchStatus::create([
            'name' => 'Finished'
        ]);

        MatchFinish::create([
            'name' => 'Half-time'
        ]);
        MatchFinish::create([
            'name' => 'Full-time'
        ]);
        MatchFinish::create([
            'name' => 'Penalties'
        ]);
    }
}
