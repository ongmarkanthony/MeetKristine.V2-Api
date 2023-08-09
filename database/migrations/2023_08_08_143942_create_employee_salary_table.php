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
    public function up(): 
    {
        Schema::create('employee_salary', function (Blueprint $table) {
            $table->id();
            $table->integer('salary_amount');
            $table->enum('pay_schedule',['monthly', 'semi-monthly']);
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('jobTitle_id');
            $table->unsignedBigInteger('department_id');
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('jobTitle_id')->references('id')->on('employees');
            $table->foreign('department_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): 
    {
        Schema::dropIfExists('employee_salary');
    }
};
