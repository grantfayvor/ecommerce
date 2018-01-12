<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function(Blueprint $table){
            $table->increments('id');
            $table->longText('cart');
            $table->string('cart_price');
            $table->string('quantity');
            $table->string('payment_id');
            $table->string('amount_paid');
            $table->string('profit');
            $table->string('customer');
            $table->string('delivery_address')->nullable();
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
        //
    }
}
