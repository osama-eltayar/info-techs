<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //########################################### Constants ################################################
    const USER = 'user';


    //########################################### Accessors ################################################


    //########################################### Mutators #################################################
    /**
     * hash the user's password.
     * @param string $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function favouriteCourses()
    {
        return $this->belongsToMany(Course::class,'user_favourite_courses')->withTimestamps();
    }

    public function shoppingCart()
    {
        return $this->belongsToMany(Course::class, ShoppingCart::class)
                    ->withPivot('paid_at', 'price')
                    ->withTimestamps();
    }


}
