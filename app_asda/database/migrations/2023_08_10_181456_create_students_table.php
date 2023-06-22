<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
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
            $table->text('name');
           
            $table->bigInteger('gender_id')->unsigned()->nullable();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('set null');
           
            $table->date('Date_Birth');
            $table->enum('greffe_cochlee', ['subi', 'nonsubi']);
            $table->date('date_greffe_cochlee')->nullable();
            $table->bigInteger('Grade_id')->unsigned()->nullable();
            $table->foreign('Grade_id')->references('id')->on('Grades')->onDelete('set null');
            
            $table->bigInteger('Classroom_id')->unsigned()->nullable();
            $table->foreign('Classroom_id')->references('id')->on('Classrooms')->onDelete('set null');
           
            $table->bigInteger('parent_id')->unsigned()->nullable();
            $table->foreign('parent_id')->references('id')->on('my__parents')->onDelete('set null');
            $table->string('academic_year');
            $table->softDeletes();
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
}
