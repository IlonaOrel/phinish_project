<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_patients', function (Blueprint $table) {
            $table->increments('id');
            $table->text('conclusion');
            $table->string('treatment');
            $table->dateTime('date_visit');
            $table->unsignedinteger('patient_id');
            $table->unsignedinteger('doctor_id');
            $table->unsignedinteger('examination_id');
            $table->unsignedinteger('status_id');
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->foreign('examination_id')->references('id')->on('examinations');
            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_patients');
    }
}
