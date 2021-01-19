<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditBlocSpotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bloc_spots', function (Blueprint $table) {
            $table->dropColumn("recommended-site-for");
            $table->dropColumn("exposure");
            $table->dropColumn("near-city");
            $table->dropColumn("approach-method");
            $table->dropColumn("approach-time");
            $table->dropColumn("for-children");
            $table->dropColumn("block-reception-quality");
            $table->dropColumn("climbing-type");
            $table->dropColumn("equipment-type");
            $table->dropColumn("several-cliff");
            $table->dropColumn("max-height");
            $table->dropColumn("ways-number");
            $table->dropColumn("quotation-min");
            $table->dropColumn("quotation-max");
            $table->dropColumn("rock");
            $table->dropColumn("profile");
            $table->dropColumn("sockets-types");
            $table->dropColumn("restrictions");
            $table->dropColumn("miscellaneous-informations");
            $table->text("data")->after("site-name");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bloc_spots', function (Blueprint $table) {
            //
        });
    }
}
