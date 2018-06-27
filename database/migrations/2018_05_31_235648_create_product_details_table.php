<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('screen')->nullable();
            $table->string('graphic_card')->nullable();
            $table->string('os')->nullable();
            $table->string('cpu')->nullable();
            $table->string('ram')->nullable();
            $table->string('rom')->nullable();
            $table->string('camera_after')->nullable();
            $table->string('camera_before')->nullable();
            $table->string('connection')->nullable();
            $table->string('conversation')->nullable();
            $table->string('weight')->nullable();
            $table->string('hard_disk')->nullable();
            $table->string('model')->nullable();
            $table->string('size')->nullable();
            $table->string('sim')->nullable();
            $table->string('memory')->nullable();
            $table->string('battery')->nullable();
            $table->string('fm')->nullable();
            $table->string('jack_headphone')->nullable();
            $table->string('warranty')->nullable();
            $table->string('policy_warranty')->nullable();
            $table->string('include')->nullable();
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
        Schema::dropIfExists('product_details');
    }
}
