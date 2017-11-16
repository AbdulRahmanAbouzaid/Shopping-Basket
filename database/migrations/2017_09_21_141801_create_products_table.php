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
            $table->integer('code')->unique();
            $table->string('name');
            $table->decimal('price');
            $table->integer('quantity');
            $table->decimal('discount_pct');
            $table->timestamps();
        });

        Schema::create('category_product', function (Blueprint $table) {
            $table->integer('category_id');
            $table->integer('product_id');
            $table->primary(['category_id', 'product_id']);
            
        });

        Schema::create('basket_product', function (Blueprint $table) {
            $table->integer('basket_id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->primary(['basket_id', 'product_id']);
            
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
        Schema::dropIfExists('category_product');
        Schema::dropIfExists('basket_product');

    }
}
