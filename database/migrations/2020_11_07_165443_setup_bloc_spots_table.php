<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetupBlocSpotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloc_spots', function (Blueprint $table) {
            $table->id();
            $table->float('lat');
            $table->float('lng');
            $table->text('site-name');
            $table->text('recommended-site-for');
            $table->text('exposure');
            $table->text('near-city');
            $table->text('approach-method');
            $table->text('approach-time');
            $table->text('for-children');
            $table->text('block-reception-quality');
            $table->text('climbing-type');
            $table->text('equipment-type');
            $table->boolean('several-cliff');
            $table->text('max-height');
            $table->text('ways-number');
            $table->text('quotation-min');
            $table->text('quotation-max');
            $table->text('rock');
            $table->text('profile');
            $table->text('sockets-types');
            $table->text('restrictions');
            $table->text('miscellaneous-informations');
            $table->string('accept_status')->default('pending');
            $table->string('author_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bloc_spots');
    }
}
