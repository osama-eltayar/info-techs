<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @method static self create(array $data)
 */
class SurveyQuestionAnswer extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    * @var array
    */
    protected $fillable = [
        'title',
        'question_id',
    ];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################


    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################
    public function question()
    {
        return $this->belongsTo(SurveyQuestion::class);
    }

    public function labels()
    {
        return $this->hasMany(SurveyQuestionAnswerLabel::class,'answer_id');
    }

}

