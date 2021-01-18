<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vps', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('server_ip',191)->nullable();
            $table->string('server_name',64)->nullable();
            $table->string('username',64)->nullable();
            $table->string('password',191)->nullable();
            $table->string('operating_system',64)->nullable();
            $table->string('vpn_type',64)->nullable();
            $table->string('vpn_connection',64)->nullable();
            $table->string('port',64)->nullable();
            
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
        Schema::dropIfExists('vps');
    }
}
