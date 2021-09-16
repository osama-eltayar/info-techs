<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @method static self create(array $data)
 */
class Transaction extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    * @var array
    */
    protected $fillable = [
        'user_id', 'number', 'total', 'type'
    ];

    //########################################### Constants ################################################
    public const PENDING = 'pending' ;
    public const DONE = 'done' ;
    public const Failed = 'failed' ;


    //########################################### Accessors ################################################


    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################
    public function shoppingCarts()
    {
        return $this->hasMany(ShoppingCart::class);
    }

}

