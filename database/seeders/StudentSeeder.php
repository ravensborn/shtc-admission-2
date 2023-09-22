<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Student::factory(100)->create([
            'department_id' => 7,
        ]);
//
//        foreach (Student::all() as $student) {
//
//            $id = public_path('seeder_data/id.png');
//            $id2 = public_path('seeder_data/id2.png');
//            $document = public_path('seeder_data/paper.png');
//            $studentPhoto = public_path('seeder_data/student.png');
//
//            $student->addMedia($studentPhoto)
//                ->usingName('student-photo')
//                ->usingFilename('student-photo.png')
//                ->preservingOriginal()
//                ->toMediaCollection('student-photo');
//
//            if ($student->uploaded_id_type == 1) {
//                $student->addMedia($id)
//                    ->usingName('national-id-front-side')
//                    ->usingFilename('national-id-front-side.png')
//                    ->preservingOriginal()
//                    ->toMediaCollection('national-id-front-side');
//
//                $student->addMedia($id)
//                    ->usingName('national-id-back-side')
//                    ->usingFilename('national-id-back-side.png')
//                    ->preservingOriginal()
//                    ->toMediaCollection('national-id-back-side');
//            } else {
//                $student->addMedia($id)
//                    ->usingName('id-front-side-photo')
//                    ->usingFilename('id-front-side-photo.png')
//                    ->preservingOriginal()
//                    ->toMediaCollection('id-front-side-photo');
//
//                $student->addMedia($id)
//                    ->usingName('id-back-side-photo')
//                    ->usingFilename('id-back-side-photo.png')
//                    ->preservingOriginal()
//                    ->toMediaCollection('id-back-side-photo');
//                $student->addMedia($id)
//                    ->usingName('nationality-card-photo')
//                    ->usingFilename('nationality-card-photo.png')
//                    ->preservingOriginal()
//                    ->toMediaCollection('nationality-card-photo');
//            }
//
//            $student->addMedia($id2)
//                ->usingName('karty-zanyari-front-side-photo')
//                ->usingFilename('karty-zanyari-front-side-photo.png')
//                ->preservingOriginal()
//                ->toMediaCollection('karty-zanyari-front-side-photo');
//
//            $student->addMedia($id2)
//                ->usingName('karty-zanyari-back-side-photo')
//                ->usingFilename('karty-zanyari-back-side-photo.png')
//                ->preservingOriginal()
//                ->toMediaCollection('karty-zanyari-back-side-photo');
//
//            $student->addMedia($id2)
//                ->usingName('residency-confirmation-photo')
//                ->usingFilename('residency-confirmation-photo.png')
//                ->preservingOriginal()
//                ->toMediaCollection('residency-confirmation-photo');
//
//            $student->addMedia($document)
//                ->usingName('food-card-photo')
//                ->usingFilename('food-card-photo.png')
//                ->preservingOriginal()
//                ->toMediaCollection('food-card-photo');
//
//            $student->addMedia($document)
//                ->usingName('brwanama-12-photo')
//                ->usingFilename('brwanama-12-photo.png')
//                ->preservingOriginal()
//                ->toMediaCollection('brwanama-12-photo');
//
//            $student->addMedia($document)
//                ->usingName('kafala-photo')
//                ->usingFilename('kafala-photo.png')
//                ->preservingOriginal()
//                ->toMediaCollection('kafala-photo');
//            $student->addMedia($document)
//                ->usingName('daray_psula')
//                ->usingFilename('daray_psula.png')
//                ->preservingOriginal()
//                ->toMediaCollection('daray_psula');
//
//
//        }
    }
}
