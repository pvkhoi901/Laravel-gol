<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UserManager
 * @package App\Models
 * @version January 28, 2022, 2:17 pm +07
 *
 * @property string $name
 * @property string $email
 * @property string $email_verified_at
 * @property string $password
 * @property string $theme
 * @property string $remember_token
 */
class UserManager extends Model
{
    use HasFactory;

    public $table = 'users';



    public $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'theme',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'string',
        'password' => 'string',
        'theme' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'email' => "required|unique:users,email,:id" ,
    ];

    public static $rule_insert = [
        'email' => ['required', 'unique:users', 'max:255'],
        'password' => ['required', 'max:255'],
    ];
}
