<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyOrphanagesTableAddLocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orphanages', function (Blueprint $table) {
            $table->bigInteger('province_id')->unsigned()->nullable()->after('id');
            $table->bigInteger('regency_id')->unsigned()->nullable()->after('province_id');
            $table->bigInteger('district_id')->unsigned()->nullable()->after('regency_id');
            $table->bigInteger('village_id')->unsigned()->nullable()->after('district_id');

            $table->foreign('province_id')
                ->references('id')
                ->on('provinces')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('regency_id')
                ->references('id')
                ->on('regencies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('district_id')
                ->references('id')
                ->on('districts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('village_id')
                ->references('id')
                ->on('villages')
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
        Schema::table('orphanages', function (Blueprint $table) {
            $table->dropForeign('orphanages_province_id_foreign');
            $table->dropForeign('orphanages_regency_id_foreign');
            $table->dropForeign('orphanages_district_id_foreign');
            $table->dropForeign('orphanages_village_id_foreign');

            $table->dropColumn('province_id');
            $table->dropColumn('regency_id');
            $table->dropColumn('district_id');
            $table->dropColumn('village_id');
        });
    }
}
