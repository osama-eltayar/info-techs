<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @method static self create(array $data)
 */
class DiscountUser extends Model
{
    use HasFactory;

    protected $table = 'discount_user';

    /**
    * The attributes that are mass assignable.
    * @var array
    */
    protected $fillable = [
        'discount_id', 'user_id', 'shopping_cart_id', 'amount', 'end_date'
    ];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################


    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################


}
