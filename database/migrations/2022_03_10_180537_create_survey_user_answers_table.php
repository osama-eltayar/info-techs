<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyUserAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_user_answers', function (Blueprint $table) {
            $table->id();
            $table->text('value');
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('survey_id')->index();
            $table->unsignedBigInteger('question_id')->index();
            $table->unsignedBigInteger('course_id')->index();
            $table->unsignedBigInteger('answer_id')->index();
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
        Schema::dropIfExists('survey_user_answers');
    }
}
