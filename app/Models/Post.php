<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Post
 * @package App\Models
 * @version July 14, 2021, 12:57 pm UTC
 *
 * @property string $title
 * @property string $description
 */
class Post extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'posts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'description' => 'required'
    ];

    
}
