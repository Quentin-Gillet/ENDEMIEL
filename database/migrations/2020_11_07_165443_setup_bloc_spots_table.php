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
            $table->text("data");
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
