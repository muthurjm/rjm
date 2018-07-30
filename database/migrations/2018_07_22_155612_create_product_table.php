<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('hsn_id');
            $table->foreign('hsn_id')->references('id')->on('hsn') ->onDelete('cascade');
            $table->string('product_no');
            $table->string('product_name')->unique()->nullable();
            $table->string('mrp')->nullable();
            $table->string('sales')->nullable();
            $table->string('invoice_price')->nullable();
            $table->string('stock')->default(0);
            $table->string('value')->nullable();
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('product');
    }
}
