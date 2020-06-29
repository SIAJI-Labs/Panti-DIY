<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrphanageUpdateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orphanage_update_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('orphanage_update_id')->unsigned();
            $table->text('message');
            $table->timestamps();

            // Relation with Orphanage Update
            $table->foreign('orphanage_update_id')
                ->references('id')
                ->on('orphanage_updates')
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
        Schema::dropIfExists('orphanage_update_logs');
    }
}
