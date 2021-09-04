<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ar');
            $table->unsignedDouble('price')->default(0);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->time('from');
            $table->time('to');
            $table->unsignedInteger('hours_count');
            $table->text('description_en');
            $table->text('description_ar');
            $table->unsignedInteger('cme_count')->nullable();
            $table->unsignedInteger('certificate')->default(0);
            $table->unsignedInteger('seats')->nullable();
            $table->unsignedInteger('type_id');
            $table->unsignedBigInteger('organization_id');
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
        Schema::dropIfExists('courses');
    }
}
