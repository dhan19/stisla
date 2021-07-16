<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Truck
 * @package App\Models
 * @version July 16, 2021, 2:36 pm UTC
 *
 * @property string $Payload
 * @property string $cargobox
 * @property string $type
 * @property string $driver
 * @property string $vehicle_number
 * @property varchar $images
 */
class Truck extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'trucks';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'Payload',
        'cargobox',
        'type',
        'driver',
        'vehicle_number',
        'images'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Payload' => 'string',
        'cargobox' => 'string',
        'type' => 'string',
        'driver' => 'string',
        'vehicle_number' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Payload' => 'required',
        'cargobox' => 'required',
        'type' => 'required',
        'driver' => 'required',
        'vehicle_number' => 'required',
        'images' => 'required'
    ];

    
}
