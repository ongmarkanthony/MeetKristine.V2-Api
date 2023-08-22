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
            $table->string('username')->unique();
            $table->string('employee_num')->unique();
            $table->string('password');
            $table->string('role')->default('user');
            $table->string('email')->unique();
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
            $table->string('sssNumber')->unique();
            $table->string('philNumber')->unique();
            $table->string('tinNumber')->unique();
            $table->string('hdmfNumber')->unique();
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
