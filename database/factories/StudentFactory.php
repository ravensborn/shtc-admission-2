<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $number = 1;
        $departmentId = $this->faker->numberBetween(1, 9);
//        $departmentId = $this->faker->numberBetween(1, 5);
        return [
            'code' => $this->faker->numberBetween(1000000, 9999999),
            'status' => $this->faker->numberBetween(1, 5),
            'number' => sprintf(
                '%s%s',
                'SHTC_',
                str_pad((string)$number++, 6, "0", STR_PAD_LEFT)
            ),
            'name_kurdish' => $this->faker->name,
            'name_english' => $this->faker->name,
            'uploaded_id_type' => $this->faker->numberBetween(1, 2),
            'gender' => $this->faker->numberBetween(1, 2),
            'birthday' => $this->faker->date,
            'birthplace' => $this->faker->city,
            'phone' => $this->faker->phoneNumber,
            'nationality' => 'Kurdish',
            'school' => 'Shaqlawa Educational Compound',
            'education_type_id' => $this->faker->numberBetween(1, 3),
            'department_type_id' => $this->faker->numberBetween(1, 3),
            'department_id' => $departmentId,
            'department_name' => Student::getDepartmentName($departmentId),
            'degree_total' => $this->faker->numberBetween(51, 100),
            'student_type_id' => $this->faker->numberBetween(1, 2),
            'religion' => ['A', 'B', 'C'][array_rand(['A', 'B', 'C'])],
            'bloodgroup_id' => $this->faker->numberBetween(1, 8),
            'parent_name' => $this->faker->name,
            'parent_occupation' => ['A', 'B', 'C'][array_rand(['A', 'B', 'C'])],
            'parent_phone' => $this->faker->phoneNumber,
            'province_id' => $this->faker->numberBetween(1, 5),
            'district' => ['A', 'B', 'C'][array_rand(['A', 'B', 'C'])],
            'sub_district' => ['A', 'B', 'C'][array_rand(['A', 'B', 'C'])],
            'village_name' => ['A', 'B', 'C'][array_rand(['A', 'B', 'C'])],
            'street' => ['A', 'B', 'C'][array_rand(['A', 'B', 'C'])],
            'nearest_place' => ['A', 'B', 'C'][array_rand(['A', 'B', 'C'])],


        ];
    }


}
