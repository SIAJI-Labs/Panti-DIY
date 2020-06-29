<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrphanageUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orphanage_updates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('orphanage_id')->unsigned();
            $table->bigInteger('writter')->unsigned();
            $table->bigInteger('editor')->unsigned();
            $table->string('title')->nullable();
            $table->longText('content');
            $table->dateTime('date_update')->nullable();
            $table->enum('status', ['publish', 'draft', 'archive'])->default('draft');
            $table->timestamps();

            // Relation with Orphanage
            $table->foreign('orphanage_id')
                ->references('id')
                ->on('orphanages')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            // Relation with Users
            $table->foreign('writter')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('editor')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orphanage_updates');
    }
}
