<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDatas2ColumnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('root',150)->default('')->nullable();
            $table->renameColumn('foto', 'filename');
            $table->string('ip',150)->default('')->nullable();
            $table->string('host',150)->default('')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('root');
            $table->renameColumn('filename', 'foto');
            $table->dropColumn('ip');
            $table->dropColumn('host');
        });
    }
}
