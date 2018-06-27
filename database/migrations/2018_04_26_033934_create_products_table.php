<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('slug')->nullable();
            $table->string('image');
            $table->text('info');
            $table->integer('price');
            $table->integer('sale_price');
            $table->integer('sale')->default(0);
            $table->integer('hotkey')->default(0);
            $table->integer('status')->default(0);
            $table->integer('likes')->default(0);
            $table->integer('comments')->default(0);
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('cascade');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')
                    ->references('id')
                    ->on('companies')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
