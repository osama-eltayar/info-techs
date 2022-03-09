<?php

namespace App\Models;

use Filter\HasFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ShoppingCart extends Pivot
{
    use HasFilter;
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'course_id', 'user_id', 'price', 'paid_at', 'transaction_id'
    ];

    protected $dates = ['paid_at'];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################
    public function getFormattedPaidAtAttribute()
    {
        return $this->paid_at->format('d/m/Y');
    }

    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################
    public function scopeForUser(Builder $query, $userId)
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
