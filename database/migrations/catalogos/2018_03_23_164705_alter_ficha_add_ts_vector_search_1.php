<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterFichaAddTsVectorSearch1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fichas', function (Blueprint $table) {
            $table->boolean('apartado')->default(false);
            $table->index('titulo')->change();
            $table->index('autor')->change();
        });
        DB::statement("ALTER TABLE fichas ADD COLUMN searchtext TSVECTOR");
        DB::statement("UPDATE fichas SET searchtext = to_tsvector('english', coalesce(trim(titulo),'') || ' ' || coalesce(trim(autor),'') || ' ' || coalesce(trim(isbn),'') )");
        DB::statement("CREATE INDEX searchtext_gin ON fichas USING GIN(searchtext)");
        DB::statement("CREATE TRIGGER ts_searchtext BEFORE INSERT OR UPDATE ON fichas FOR EACH ROW EXECUTE PROCEDURE tsvector_update_trigger('searchtext', 'pg_catalog.english', 'titulo', 'autor', 'isbn')");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fichas', function (Blueprint $table) {
            $table->dropColumn('apartado');
            $table->dropIndex('fichas_titulo_index')->change();
            $table->dropIndex('fichas_autor_index')->change();
        });
        DB::statement("DROP TRIGGER IF EXISTS tsvector_update_trigger ON fichas");
        DB::statement("DROP INDEX IF EXISTS searchtext_gin");
        DB::statement("DROP TRIGGER IF EXISTS ts_searchtext ON fichas");
        DB::statement("ALTER TABLE fichas DROP COLUMN IF EXISTS searchtext");
//        Schema::dropIfExists('fichas');

    }
}
