<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResellerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reseller', function (Blueprint $table) {

            $table->bigIncrements('id');
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reseller');
    }
}
