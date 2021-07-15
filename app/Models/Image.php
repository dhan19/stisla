<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Image
 * @package App\Models
 * @version July 15, 2021, 1:05 pm UTC
 *
 * @property string $title
 * @property string $description
 * @property string $images
 * @property integer $capacity
 */
class Image extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'images';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'description',
        'images',
        'capacity'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'images' => 'string',
        'capacity' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'description' => 'required',
        'images' => 'required',
        'capacity' => 'required'
    ];

    
}
