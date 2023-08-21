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
        Schema::table('leave_proposals', function (Blueprint $table) {
            //
            $table->enum('leave_type',['sick','emergency','vacation','maternity']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leave_proposals', function (Blueprint $table) {
            //
            Schema::dropIfExists('leave_type');
        });
    }
};
