<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('type');
            $table->string('name');
            $table->string('code')->unique();
            $table->unsignedDouble('amount');
            $table->unsignedTinyInteger('amount_type');
            $table->unsignedInteger('generation_number');
            $table->unsignedInteger('limit_usage');
            $table->unsignedBigInteger('course_id')->nullable()->index();
            $table->unsignedBigInteger('speciality_id')->nullable()->index();
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('discounts');
    }
}
