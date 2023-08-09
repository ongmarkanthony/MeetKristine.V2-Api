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
            $table->string('employee_id');
            $table->string('email');
            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');
            $table->string('jobTitle');
            $table->string('department');
            $table->date('dateHired');
            $table->date('dateOfBirth');
            $table->string('gender');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('country');
            $table->string('postalCode');
            $table->integer('sssNumber');
            $table->string('philNumber');
            $table->integer('tinNumber');
            $table->integer('hdmfNumber');
            $table->string('bankName');
            $table->integer('bankAccount');
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
