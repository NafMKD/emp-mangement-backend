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
            $table->id('emp_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('region');
            $table->string('zone');
            $table->string('city');
            $table->string('house_no');
            $table->string('martial_status');
            $table->string('work_position');
            $table->date('start_date');
            $table->unsignedBigInteger('salary');
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
