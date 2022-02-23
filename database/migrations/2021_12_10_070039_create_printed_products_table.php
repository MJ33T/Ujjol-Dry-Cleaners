<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrintedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('printed_products', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->string('name');
            $table->string('recieved');
            $table->string('cloth_bref');
            $table->double('total');
            $table->String('status');
            $table->double('discount')->default('0');
            $table->double('service')->default('0');
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
        Schema::dropIfExists('printed_products');
    }
}
