<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_seeds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code')->unique();
            $table->string('name');
            $table->string('name_ar');
            $table->decimal('price');
            $table->integer('quantity');
            $table->decimal('discount_pct');
            $table->text('image');
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
        Schema::dropIfExists('product_seeds');
    }
}
