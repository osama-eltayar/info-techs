<?php

namespace App\Models;

use App\Traits\HasFiles;
use App\Traits\HasSort;
use Filter\HasFilter;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles;
    use HasFiles,HasFilter;
    use HasSort;

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
    const ADMIN = 'admin';
    const OWNER ='owner';


    //########################################### Accessors ################################################
    public function getFirstNameAttribute()
    {
        return Str::before($this->name,' ') ;
    }

    public function isUser()
    {
        return $this->hasRole(self::USER);
    }

    public function isAdmin()
    {
        return $this->hasRole(self::ADMIN);
    }

    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }

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
    public function scopeUser($q)
    {
        return $q->role(self::USER);
    }

    public function scopeAdmin($q)
    {
        return $q->role(self::ADMIN);

    }

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

    public function registeredCourses()
    {
        return $this->belongsToMany(Course::class,'user_registered_course')->withTimestamps();
    }

    public function certificates()
    {
        return $this->hasMany(UserCertificate::class);
    }

    public function organization()
    {
        return $this->hasOne(Organization::class);
    }

}
