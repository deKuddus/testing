<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_ticket', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('reseller_id')->nullable();

            $table->string('ticket_option',191)->nullable();
            $table->string('name',64)->nullable();
            $table->string('email',64)->nullable();
            $table->text('subject')->nullable();
            $table->text('description')->nullable();
            $table->string('image',128)->nullable();

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
        Schema::dropIfExists('support_ticket');
    }
}
