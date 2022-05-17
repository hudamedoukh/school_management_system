<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classrooms', function(Blueprint $table) {
			$table->foreign('Grade_id')->references('id')->on('grades')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classrooms', function(Blueprint $table) {
			$table->dropForeign('classrooms_Grade_id_foreign');
		});
        //Schema::dropIfExists('foreign_keys');
    }
}
