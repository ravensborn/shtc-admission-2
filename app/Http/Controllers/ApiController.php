<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index() {

        $validated = \request()->validate([
            'department_id' => 'required_if:mode,student|integer|exists:departments,id',
            'mode' => 'required|string|in:student,department'
        ]);

        $students = collect();

       if (array_key_exists('department_id', $validated) && $validated['department_id']) {
           $students = Student::where('stage', Student::STAGE_STATUS_1)
               ->where('department_id', $validated['department_id'])
               ->get()
               ->map(function ($student) {
                   return [
                       'unique_id' => $student->number,
                       'name_kurdish' => $student->name_kurdish,
                       'name_english' => $student->name_english,
                       'phone_number' => $student->phone,
                       'gender' => $student->gender == 2 ? 1 : 0,
                       'stage' => Student::STAGE_STATUS_1,
                       'department_id' => $student->department_id,
                       'type' => $student->department_type_id,
                       'date' => $student->created_at->format('Y-m-d'),
                   ];
               });
       }

        $departments = Department::all()->map(function ($department) {
            return [
                'id' => $department->id,
                'name' => $department->name,
            ];
        });

        $data = $departments;

        if($validated['mode'] == 'student') {
            $data = $students;
        }

        return response()->json([
            'status' => true,
            'message' => 'Successfully retrieved students data.',
            'mode' => $validated['mode'],
            'data' => $data
        ]);

    }
}
