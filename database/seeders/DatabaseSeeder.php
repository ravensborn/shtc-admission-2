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

        $user = \App\Models\User::factory(1)->create([
            'name' => 'Yad Hoshyar',
            'email' => 'yad@gmail.com'
        ]);

        \App\Models\Student::factory(100)->create();

        foreach (Student::all() as $student) {

            $id = asset('seeder_data/id.png');
            $id2 = asset('seeder_data/id2.png');
            $document = asset('seeder_data/paper.png');
            $studentPhoto = asset('seeder_data/student.png');

            $student->addMediaFromUrl($studentPhoto)
                ->usingName('student-photo')
                ->usingFilename('student-photo.png')
                ->preservingOriginal()
                ->toMediaCollection('student-photo');

            if($student->uploaded_id_type == 1) {
                $student->addMediaFromUrl($id)
                    ->usingName('national-id-front-side')
                    ->usingFilename('national-id-front-side.png')
                    ->preservingOriginal()
                    ->toMediaCollection('national-id-front-side');

                $student->addMediaFromUrl($id)
                    ->usingName('national-id-back-side')
                    ->usingFilename('national-id-back-side.png')
                    ->preservingOriginal()
                    ->toMediaCollection('national-id-back-side');
            } else {
                $student->addMediaFromUrl($id)
                    ->usingName('id-front-side-photo')
                    ->usingFilename('id-front-side-photo.png')
                    ->preservingOriginal()
                    ->toMediaCollection('id-front-side-photo');

                $student->addMediaFromUrl($id)
                    ->usingName('id-back-side-photo')
                    ->usingFilename('id-back-side-photo.png')
                    ->preservingOriginal()
                    ->toMediaCollection('id-back-side-photo');
                $student->addMediaFromUrl($id)
                    ->usingName('nationality-card-photo')
                    ->usingFilename('nationality-card-photo.png')
                    ->preservingOriginal()
                    ->toMediaCollection('nationality-card-photo');
            }

            $student->addMediaFromUrl($id2)
                ->usingName('karty-zanyari-front-side-photo')
                ->usingFilename('karty-zanyari-front-side-photo.png')
                ->preservingOriginal()
                ->toMediaCollection('karty-zanyari-front-side-photo');

            $student->addMediaFromUrl($id2)
                ->usingName('karty-zanyari-back-side-photo')
                ->usingFilename('karty-zanyari-back-side-photo.png')
                ->preservingOriginal()
                ->toMediaCollection('karty-zanyari-back-side-photo');

            $student->addMediaFromUrl($id2)
                ->usingName('residency-confirmation-photo')
                ->usingFilename('residency-confirmation-photo.png')
                ->preservingOriginal()
                ->toMediaCollection('residency-confirmation-photo');

            $student->addMediaFromUrl($document)
                ->usingName('food-card-photo')
                ->usingFilename('food-card-photo.png')
                ->preservingOriginal()
                ->toMediaCollection('food-card-photo');

        }

        $user = User::find(1);

        $adminRole = Role::create(['name' => 'admin']);
        $user->assignRole($adminRole);

    }
}
