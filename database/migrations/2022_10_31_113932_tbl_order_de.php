<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblOrderDe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order_de', function (Blueprint $table) {
            $table->bigIncrements('order_de_id');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->string('product_name');
            $table->float('product_price');
            $table->integer('product_qty');
        
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
        Schema::dropIfExists('tbl_order_de');
    }
}
