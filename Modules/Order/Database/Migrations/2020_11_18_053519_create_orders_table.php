<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->unsignedBigInteger('reseller_id')->nullable();

            $table->string('order_number',32)->nullable();
            $table->date('date')->nullable();
            $table->decimal('vat_rate',10,2)->nullable();
            $table->decimal('vat_amount',10,4)->nullable();
            $table->decimal('total_price',10,4)->nullable();
            $table->string('payment_type',16)->nullable();

            $table->text('note')->nullable();
            
            $table->enum('status',array('pending','processing','confirmed','failed','cancel'))->nullable();

            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();

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
        Schema::dropIfExists('orders');
    }
}
