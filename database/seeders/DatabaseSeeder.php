<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Student;
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

//        Role::create(['name' => 'admin']);
//        Role::create(['name' => 'limited']);
//
//        Role::create(['name' => 'MIS']);
//        Role::create(['name' => 'AD']);
//        Role::create(['name' => 'VET']);
//        Role::create(['name' => 'NURSING']);
//        Role::create(['name' => 'MLT']);
//        Role::create(['name' => 'ARC']);
//        Role::create(['name' => 'BUILD']);
//        Role::create(['name' => 'TOURISM']);
//        Role::create(['name' => 'STATISTICS_ONLY']);

        $users = [
//            [
//                'name' => 'Yad Hoshyar',
//                'email' => 'yad@gmail.com',
//                'role_name' => 'admin',
//                'password' => 'password'
//            ],
            [
                'name' => 'Dr. Abdoulkhaliq Nadir',
                'email' => 'dr.abdoulkhaliq@shtc-tomar.com',
                'role_name' => 'admin',
                'password' => 'dym65849'
            ],
            [
                'name' => 'Yad Hoshyar',
                'email' => 'yad.hoshyar@gmail.com',
                'role_name' => 'admin',
                'password' => 'newpassword'
            ],
            [
                'name' => 'Balen A.',
                'email' => 'abdulqadr.balen@shtc-tomar.com',
                'role_name' => 'admin',
                'password' => 'newpassword'
            ],
            [
                'name' => 'Rebwar Mustafa',
                'email' => 'rebwar.m@shtc-tomar.com',
                'role_name' => 'MIS',
                'password' => 'shtc963'
            ],
            [
                'name' => 'Rizgar Shahab',
                'email' => 'rizgar.s@shtc-tomar.com',
                'role_name' => 'AD',
                'password' => 'shtc852'
            ],
            [
                'name' => 'Kaify Jabar',
                'email' => 'kaify.j@shtc-tomar.com',
                'role_name' => 'VET',
                'password' => 'shtc741'
            ],
            [
                'name' => 'Niyaz Abdulla',
                'email' => 'niyaz.a@shtc-tomar.com',
                'role_name' => 'NURSING',
                'password' => 'shtc789'
            ],
            [
                'name' => 'Ali Zainal',
                'email' => 'ali.z@shtc-tomar.com',
                'role_name' => 'MLT',
                'password' => 'shtc456'
            ],
            [
                'name' => 'Jalal Fadhil',
                'email' => 'jalal.f@shtc-tomar.com',
                'role_name' => 'ARC',
                'password' => 'shtc7541'
            ],
            [
                'name' => 'Aras Hussein',
                'email' => 'aras.h@shtc-tomar.com',
                'role_name' => 'BUILD',
                'password' => 'shtc951'
            ],
            [
                'name' => 'Alandi A',
                'email' => 'alandi.a@shtc-tomar.com',
                'role_name' => 'TOURISM',
                'password' => 'shtc753'
            ],
        ];

        foreach ($users as $user) {

            \App\Models\User::factory()->create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt($user['password'])
            ]);

            $DB_USER = User::where('email', $user['email'])->first();

            if($user['role_name'] == 'admin') {

                $DB_USER->assignRole($user['role_name']);
            } else {

                $DB_USER->assignRole(['limited', $user['role_name']]);
            }

        }




//        \App\Models\Student::factory(100)->create();

//        foreach (Student::all() as $student) {
//
//            $id = asset('seeder_data/id.png');
//            $id2 = asset('seeder_data/id2.png');
//            $document = asset('seeder_data/paper.png');
//            $studentPhoto = asset('seeder_data/student.png');
//
//            $student->addMediaFromUrl($studentPhoto)
//                ->usingName('student-photo')
//                ->usingFilename('student-photo.png')
//                ->preservingOriginal()
//                ->toMediaCollection('student-photo');
//
//            if ($student->uploaded_id_type == 1) {
//                $student->addMediaFromUrl($id)
//                    ->usingName('national-id-front-side')
//                    ->usingFilename('national-id-front-side.png')
//                    ->preservingOriginal()
//                    ->toMediaCollection('national-id-front-side');
//
//                $student->addMediaFromUrl($id)
//                    ->usingName('national-id-back-side')
//                    ->usingFilename('national-id-back-side.png')
//                    ->preservingOriginal()
//                    ->toMediaCollection('national-id-back-side');
//            } else {
//                $student->addMediaFromUrl($id)
//                    ->usingName('id-front-side-photo')
//                    ->usingFilename('id-front-side-photo.png')
//                    ->preservingOriginal()
//                    ->toMediaCollection('id-front-side-photo');
//
//                $student->addMediaFromUrl($id)
//                    ->usingName('id-back-side-photo')
//                    ->usingFilename('id-back-side-photo.png')
//                    ->preservingOriginal()
//                    ->toMediaCollection('id-back-side-photo');
//                $student->addMediaFromUrl($id)
//                    ->usingName('nationality-card-photo')
//                    ->usingFilename('nationality-card-photo.png')
//                    ->preservingOriginal()
//                    ->toMediaCollection('nationality-card-photo');
//            }
//
//            $student->addMediaFromUrl($id2)
//                ->usingName('karty-zanyari-front-side-photo')
//                ->usingFilename('karty-zanyari-front-side-photo.png')
//                ->preservingOriginal()
//                ->toMediaCollection('karty-zanyari-front-side-photo');
//
//            $student->addMediaFromUrl($id2)
//                ->usingName('karty-zanyari-back-side-photo')
//                ->usingFilename('karty-zanyari-back-side-photo.png')
//                ->preservingOriginal()
//                ->toMediaCollection('karty-zanyari-back-side-photo');
//
//            $student->addMediaFromUrl($id2)
//                ->usingName('residency-confirmation-photo')
//                ->usingFilename('residency-confirmation-photo.png')
//                ->preservingOriginal()
//                ->toMediaCollection('residency-confirmation-photo');
//
//            $student->addMediaFromUrl($document)
//                ->usingName('food-card-photo')
//                ->usingFilename('food-card-photo.png')
//                ->preservingOriginal()
//                ->toMediaCollection('food-card-photo');
//
//            $student->addMediaFromUrl($document)
//                ->usingName('brwanama-12-photo')
//                ->usingFilename('brwanama-12-photo.png')
//                ->preservingOriginal()
//                ->toMediaCollection('brwanama-12-photo');
//
//            $student->addMediaFromUrl($document)
//                ->usingName('kafala-photo')
//                ->usingFilename('kafala-photo.png')
//                ->preservingOriginal()
//                ->toMediaCollection('kafala-photo');
//            $student->addMediaFromUrl($document)
//                ->usingName('daray_psula')
//                ->usingFilename('daray_psula.png')
//                ->preservingOriginal()
//                ->toMediaCollection('daray_psula');
//
//
//        }


    }
}
