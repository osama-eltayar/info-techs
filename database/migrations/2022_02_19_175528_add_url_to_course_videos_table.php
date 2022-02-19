<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUrlToCourseVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_videos', function (Blueprint $table) {
            $table->string('url')->nullable()->after('path');
            $table->string('path')->nullable()->change();
            $table->string('mime_type')->nullable()->change();
            $table->unsignedInteger('size')->nullable()->change();
            $table->unsignedInteger('duration')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_videos', function (Blueprint $table) {
            $table->dropColumn('url');
            $table->string('path')->change();
            $table->string('mime_type')->change();
        });
    }
}
