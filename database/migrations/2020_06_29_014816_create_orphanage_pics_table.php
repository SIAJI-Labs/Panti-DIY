<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrphanagePicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orphanage_pics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('orphanage_id')->unsigned();
            $table->string('name');
            $table->string('contact');
            $table->enum('type', ['whatsapp', 'phone', 'mobile', 'email', 'address'])->default('mobile');
            $table->timestamps();

            $table->foreign('orphanage_id')
                ->references('id')
                ->on('orphanages')
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
        Schema::dropIfExists('orphanage_pics');
    }
}
