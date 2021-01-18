<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('reseller_id')->nullable();

            $table->string('name',191)->nullable();
            $table->string('email',64)->nullable();
            $table->string('mobile',15)->nullable();
            $table->string('username',64)->nullable();
            $table->string('password',191)->nullable();
            $table->text('address')->nullable();
            $table->string('from_date',64)->nullable();
            $table->string('to_date',64)->nullable();
            $table->string('user_limit',32)->nullable();
            $table->string('billing_system',64)->nullable();
            $table->integer('status')->default(1);
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->timestamps();

            $table->foreign('reseller_id')->references('id')->on('reseller')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
