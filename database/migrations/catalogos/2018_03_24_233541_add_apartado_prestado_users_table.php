<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddApartadoPrestadoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fichas', function (Blueprint $table) {
            $table->unsignedInteger('apartado_user_id')->default(0)->nullable();
            $table->unsignedInteger('prestado_user_id')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fichas', function (Blueprint $table) {
            $table->dropColumn('apartado_user_id');
            $table->dropColumn('prestado_user_id');
        });
    }
}
