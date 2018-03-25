<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichasUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ficha_id');
            $table->unsignedInteger('user_id');
            $table->string('action',15)->defaul('')->nonullable();
            $table->date('fecha')->default(NULL)->nullable();
            $table->string('observaciones',250)->default('')->nullable();
            $table->unsignedSmallInteger('idemp')->default(0)->nullable();
            $table->unsignedSmallInteger('status_ficha_user')->default(1)->nullable();
            $table->string('ip',150)->default('')->nullable();
            $table->string('host',150)->default('')->nullable();
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
        Schema::dropIfExists('ficha_user');
    }
}
