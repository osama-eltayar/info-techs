<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->string('address')->nullable()->after('duration');
            $table->string('location')->nullable()->after('address');
            $table->dateTime('published_at')->default(now())->after('location');
            $table->unsignedBigInteger('speciality_id')->after('published_at')->index();
            $table->unsignedBigInteger('is_views_hidden')->after('published_at')->default(false);
            $table->dateTime('start_date')->nullable()->change();
            $table->dateTime('end_date')->nullable()->change();
            $table->time('from')->nullable()->change();
            $table->time('to')->nullable()->change();
            $table->unsignedInteger('hours_count')->nullable()->change();
            $table->unsignedBigInteger('duration')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn([
                'address' ,
                'location',
                'published_at',
                'is_views_hidden',
                'speciality_id'
            ]);
        });
    }
}
