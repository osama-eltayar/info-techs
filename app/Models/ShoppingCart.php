<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ShoppingCart extends Pivot
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'course_id', 'user_id', 'price', 'paid_at', 'transaction_id'
    ];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################


    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################
    public function scopeForUser(Builder $query,$userId)
    {
        return $query->where('user_id', $userId);
    }


    //########################################### Relations ################################################
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }


}
