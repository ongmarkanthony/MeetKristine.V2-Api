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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('userRole');
            $table->string('employee_id');
            $table->string('password');
            $table->string('email');
            $table->string('firstName');
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
            $table->string('sssNumber');
            $table->string('philNumber');
            $table->string('tinNumber');
            $table->string('hdmfNumber');
            $table->string('bankName');
            $table->string('bankAccount');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
