<?php

namespace App\Models;

use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\SponsorMaterialController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @method static self create( array $data )
 */
class SponsorMaterial extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable
        = [
            'name_ar',
            'name_en',
            'path',
            'mime_type',
            'sponsor_id'
        ];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################

    public function getNameAttribute()
    {
        return $this->{getLocalizeAttribute('name')};
    }


    public function getMaterialUrlAttribute()
    {
        return action([SponsorMaterialController::class,'download'],['sponsor' => $this->sponsor_id, 'material' => $this->id]);
    }

    public function getMaterialSizeAttribute()
    {
        return formatSizeUnits(Storage::size($this->path));
    }


    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################


}

