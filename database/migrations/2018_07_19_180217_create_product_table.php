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
            $table->string('product_no');
            $table->string('hsn_code')->nullable();
            $table->string('product_name')->nullable();
            $table->string('mrp')->nullable();
            $table->string('tax')->nullable();
            $table->string('sales')->nullable();
            $table->string('invoice_price')->nullable();
            $table->string('stock_status')->nullable();
            $table->string('pmk_status')->nullable();
            $table->string('act_total')->nullable();
            $table->string('hand')->nullable();
            $table->string('value')->nullable();
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
