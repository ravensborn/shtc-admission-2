<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\log;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'export']);

        $users = [
            [
                'name' => 'Superadmin',
                'email' => 'yad.hoshyar@gmail.com',
                'password' => 'superadmin@',
                'roles' => ['admin', 'export'],
                'department_id' => null,
            ],
//            [
//                'name' => 'Admin',
//                'email' => 'admin@admissions.epu.edu.iq',
//                'password' => 'admissions@' . rand(1000,9999),
//                'roles' => ['admin', 'export'],
//                'department_id' => null,
//            ],
        ];

//        $collegeCode = \Str::lower(config('envAccess.COLLEGE_CODE'));
//
//        foreach (Department::all() as $department) {
//
//            $users[] = [
//                'name' => $collegeCode . '-dep-' . $department->id,
//                'email' => $collegeCode . '-dep-' . $department->id . '@admissions.epu.edu.iq',
//                'password' => $collegeCode . rand(1000,9999),
//                'roles' => [],
//                'department_id' => $department->id,
//            ];
//        }

        foreach ($users as $user) {

            $createdUser = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt($user['password']),
                'department_id' => $user['department_id']
            ]);

            foreach ($user['roles'] as $role) {
                $createdUser->assignRole($role);
            }

        }


    }
}
