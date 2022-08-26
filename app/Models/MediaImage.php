<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MediaImage
 * @package App\Models
 * @version July 18, 2022, 10:14 am +07
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 */
class MediaImage extends Model
{
    use HasFactory;

    public $table = 'media_images';



    public $fillable = [
        'id',
        'name',
        'url_image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'url_image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];
}
