<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static self create(array $data)
 */
class SurveyQuestion extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable
        = [
            'title',
            'type',
            'survey_id',
        ];

    //########################################### Constants ################################################
    const TEXT     = 1;
    const CHECKBOX = 2;
    const RADIO    = 3;


    //########################################### Accessors ################################################
    public function isText()
    {
        return $this->type == self::TEXT;
    }
    public function isCheckbox()
    {
        return $this->type == self::CHECKBOX;
    }
    public function isRadio()
    {
        return $this->type == self::RADIO;
    }

    public static function getMappedTypes()
    {
        return [
            [
                'name' => 'Text',
                'value' => self::TEXT
            ],
            [
                'name' => 'Checkbox',
                'value' => self::CHECKBOX
            ],  [
                'name' => 'Radio',
                'value' => self::RADIO
            ]
        ];
    }


    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################
    public function answers()
    {
        return $this->hasMany(SurveyQuestionAnswer::class,'question_id');
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

}

