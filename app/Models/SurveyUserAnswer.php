<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @method static self create(array $data)
 */
class SurveyUserAnswer extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    * @var array
     */
    protected $fillable
        = [
            "value",
            "user_id",
            "survey_id",
            "question_id",
            "course_id",
            "answer_id",
        ];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################


    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################
    public function question()
    {
        return $this->belongsTo(SurveyQuestion::class,'question_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function answer()
    {
        return $this->belongsTo(SurveyQuestionAnswer::class,'answer_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }





}

