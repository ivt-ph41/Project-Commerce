<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetaiProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detai_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('origin')->nullable();
            $table->string('brand')->nullable();
            $table->string('color');
            $table->string('dimension');
            $table->string('weight');
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detai_products');
    }
}
