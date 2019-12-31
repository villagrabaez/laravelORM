<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLevelIdAtUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {

            $table->bigInteger('level_id')
                ->unsigned()
                ->nullable()
                ->after('id');

            $table->foreign('level_id')->references('id')->on('levels')
                ->onDelete('set null') // si un nivel se borra, no se borran los usuarios.
                ->onUpdate('cascade'); // si se actualiza un nivel, se actualizan en lo usuarios.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('users', function(Blueprint $table){
        //     $table->dropColumn('level_id');
        //     $table->dropForeign('level_id');
        // });
    }
}
