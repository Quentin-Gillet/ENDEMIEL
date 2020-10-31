<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeMapMarkersToBlocSite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('map_markers', 'bloc_sites');

        Schema::table('files', function (Blueprint $table) {
            $table->string('file_type')->nullable()->after('url');
            $table->dropColumn('marker_id');
            $table->integer('bloc_site_id')->after('file_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bloc_site', function (Blueprint $table) {
            //
        });
    }
}
