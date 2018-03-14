<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdminColumnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('admin')->default(false);
            $table->unsignedSmallInteger('idemp')->default(0)->nullable();
            $table->unsignedSmallInteger('status_user')->default(1)->nullable();
            $table->renameColumn('name', 'username');
            $table->unique('username')->change();
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
            $table->dropColumn('admin');
            $table->dropColumn('idemp');
            $table->dropColumn('status_user');
            $table->dropUnique('users_username_unique')->change();
        });
    }
}
