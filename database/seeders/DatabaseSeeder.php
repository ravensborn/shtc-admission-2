<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $user = \App\Models\User::factory(1)->create([
            'name' => 'Yad Hoshyar',
            'email' => 'yad@gmail.com'
        ]);

        \App\Models\Student::factory(100)->create();

        $user = User::find(1);

        $adminRole = Role::create(['name' => 'admin']);
        $user->assignRole($adminRole);

    }
}
