<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotStudentTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_teacher', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("teacher_id")->constrained();
            $table->unsignedBigInteger("student_id");
            $table->foreign("student_id")->references("id")->on("students");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_teacher');
    }
}
