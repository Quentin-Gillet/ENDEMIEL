<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNullValueToBlocSiteIdFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('files', function (Blueprint $table) {
            $table->integer('bloc_site_id')->nullable()->change();
            $table->string('file_upload_id')->nullable()->after('bloc_site_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bloc_site_id_files', function (Blueprint $table) {
            //
        });
    }
}
