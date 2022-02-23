<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('recieved');
            $table->string('cloth_bref');
            $table->double('iron_total')->default('0');
            $table->double('iron_worker_total')->default('0');
            $table->double('wash_total')->default('0');
            $table->double('wash_worker_total')->default('0');
            $table->double('iron_income')->default('0');
            $table->double('wash_income')->default('0');
            $table->double('total_income')->default('0');
            $table->double('service')->default('0');
            $table->string('status');
            $table->string('iron_worker')->default('tapos');
            $table->string('wash_worker')->default('dhopa-1');
            $table->double('discount')->default('0');
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
        Schema::dropIfExists('reports');
    }
}
