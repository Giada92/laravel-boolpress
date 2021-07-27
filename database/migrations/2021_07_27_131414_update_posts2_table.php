<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePosts2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //creata la nuova colonna
            $table->unsignedBigInteger('category_id')->nullable()->after('id'); //nullable - un articolo può non avere una categoria di appartenenza

            //creazione foreing
            //references - nome del campo a cui faccio riferimento nell'altra tabella
            //on - nome tabella della relazione
            //onDelete - se dovessi cancellare una categoria, non devo cancellare i post o non mi deve bloccare
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //per cancellare la foreing key - nome tabella_nome colonna_foreign
            $table->dropForeign('posts_category_id_foreign');
            $table->dropColumn('category_id');
        });
    }
}
