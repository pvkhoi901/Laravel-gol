<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{


    use HasFactory;

    protected $guarded = [];
    protected $table = 'settings';

    public static function  getSettingByGroup($group = "", $name = "", $default = "")
    {
        if ($settings  = self::where("group", $group)
            ->where("name", $name)
            ->first()
        ) {
            return $settings->value;
        }
        return  $default;
    }
}
