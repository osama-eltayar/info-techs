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


}

