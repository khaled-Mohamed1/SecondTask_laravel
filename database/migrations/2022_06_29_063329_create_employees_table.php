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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('secondname');
            $table->string('thirdname');
            $table->string('fourthname');
            $table->integer('IDnumber');
            $table->integer('job_number');
            $table->string('specialty');
            $table->string('status');
            $table->string('gender');
            $table->string('phone');
            $table->string('telephone');
            $table->string('email');
            $table->date('hiring_date');
            $table->date('date_of_birth');
            $table->text('address');
            $table->string('personal_image');
            $table->string('IDimage');
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
        Schema::dropIfExists('employees');
    }
};
