<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->string('number');
            $table->string('code');

            $table->integer('status')->default(\App\Models\Student::STATUS_DEFAULT);

            $table->string('name_kurdish');
            $table->string('name_english');

            $table->integer('uploaded_id_type');

            $table->boolean('gender');
            $table->date('birthday');
            $table->string('birthplace');
            $table->string('phone');
            $table->string('nationality');
            $table->string('school');
            $table->integer('education_type_id');
            $table->integer('department_type_id');
            $table->integer('department_id');
            $table->string('department_name');
            $table->string('degree_total');
            $table->integer('student_type_id');
            $table->string('religion');
            $table->integer('bloodgroup_id');
            $table->string('parent_name');
            $table->string('parent_occupation');
            $table->string('parent_phone');
            $table->integer('province_id');
            $table->string('district');
            $table->string('sub_district');
            $table->string('village_name')->nullable();
            $table->string('street');
            $table->string('nearest_place');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
