<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerVendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_vendor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('vendor_id')->unsigned();

            $table->foreign('vendor_id')
                ->references('id')->on('vendors')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('customer_id')
                ->references('id')->on('customers')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

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
        Schema::dropIfExists('customer_vendor');
    }
}
