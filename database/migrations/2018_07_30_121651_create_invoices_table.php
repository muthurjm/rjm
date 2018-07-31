<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_number');
            $table->date('invoice_date');
            $table->unsignedInteger('client_code');
            $table->foreign('client_code')->references('id')->on('client');
            $table->string('name');
            $table->string('street')->nullable();
            $table->string('city'); 
            $table->string('tin')->nullable();
            $table->bigInteger('phone1');
            $table->bigInteger('sub_total');
            $table->bigInteger('cgst_6');
            $table->bigInteger('cgst_9');
            $table->bigInteger('cgst_14');
            $table->bigInteger('sgst_6');
            $table->bigInteger('sgst_9');
            $table->bigInteger('sgst_14');
            $table->bigInteger('gst_12');
            $table->bigInteger('gst_18');
            $table->bigInteger('gst_28');
            $table->bigInteger('grand_total');
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
        Schema::dropIfExists('invoices');
    }
}
