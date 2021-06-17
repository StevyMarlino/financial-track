<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name_host');
            $table->string('name_customer');
            $table->boolean('verify')->default(false);
            $table->enum('price',['10000','15000','20000','25000','30000','40000','50000']);
            $table->enum('service',['REGISTER','RENEW','SMS']);
            $table->enum('method_payment',['ORANGE MONEY','MTN MONEY','CASH']);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('invoice_id')->default(0);

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('domains');
    }
}
