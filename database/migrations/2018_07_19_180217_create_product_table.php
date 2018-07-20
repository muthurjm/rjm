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
            $table->increments('id');
            $table->string('product_no');
            $table->string('match_code');
            $table->string('hsn_code');
            $table->string('description');
            $table->string('mrp');
            $table->string('tax');
            $table->string('sales_nml');
            $table->string('spl_l');
            $table->string('spl_m');
            $table->string('invoice_price');
            $table->string('unit_pr');
            $table->string('act_stock_status');
            $table->string('pmk_status');
            $table->string('act_total');
            $table->string('sales_nrm');
            $table->string('spl_low');
            $table->string('spl_n');
            $table->string('sales_med');
            $table->string('total_sales');
            $table->string('hand');
            $table->string('value1');
            $table->string('rmd_hand');
            $table->string('pmk_hand');
            $table->string('him_stck_ttl');
            $table->string('him_hand');
            $table->string('value2');
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
