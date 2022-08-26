<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class email_marketing
 * @package App\Models
 * @version March 15, 2022, 11:27 am +07
 *
 * @property string $title
 * @property string $email_content
 */
class EmailMarketing extends Model
{
    use HasFactory;

    public $table = 'email_marketing';


    public $fillable = [
        'email_title',
        'email_content',
        'customer_region',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'email_title' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];
}
