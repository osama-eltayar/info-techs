<?php

namespace App\Models;

use App\Enums\DiscountAmountTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static self create(array $data)
 */
class Discount extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'type',
        'name',
        'code',
        'amount',
        'amount_type',
        'generation_number',
        'limit_usage',
        'course_id',
        'speciality_id',
        'start_date',
        'end_date'
    ];

    protected $dates = ['start_date', 'end_date'];

    //########################################### Constants ################################################
    const INDIVIDUAL = 1;
    const GENERAL = 2;

    //########################################### Accessors ################################################
    public function isIndividual()
    {
        return $this->type == self::INDIVIDUAL;
    }

    public function isGeneral()
    {
        return $this->type == self::GENERAL;
    }

    public function isCash()
    {
        return $this->amount_type == DiscountAmountTypeEnum::CASH;
    }

    public function isPercentage()
    {
        return $this->amount_type == DiscountAmountTypeEnum::PERCENTAGE;
    }


    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################


    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class, 'speciality_id');
    }
}
