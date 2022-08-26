<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


/**
 * Class Languages
 * @package App\Models
 * @version January 27, 2022, 9:47 am +07
 *
 * @property string $country
 * @property string $language_key
 * @property string $language_title
 * @property string $language_image
 * @property string $language_url
 * @property string $description
 */
class  Languages extends Model
{
    use HasFactory;

    public $table = 'languages';


    public $fillable = [
        'country',
        'language_key',
        'language_title',
        'language_image',
        'language_image_mobile',

        'language_image_2',
        'language_image_mobile_2',
        'language_image_url_2',
        'language_image_3',
        'language_image_mobile_3',
        'language_image_url_3',
        'language_url',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'country' => 'string',
        'language_key' => 'string',
        'language_title' => 'string',
        'language_image' => 'string',
        'language_image_mobile' => 'string',
        'language_image_2' => 'string',
        'language_image_url_2' => 'string',
        'language_image_mobile_2' => 'string',

        'language_image_3' => 'string',
        'language_image_url_3' => 'string',
        'language_image_mobile_3' => 'string',
        'language_url' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];


    public static function getLanguageByCountry($country = 'vn', $check_mobile = false)
    {
        if (!in_array($country, COUNTRY_CODE)) {
            $country = 'kr';
        }

        $data = [];
        $languages = Languages::where("country", $country)
            ->get()->toArray();

        $check_login = Auth::check();
        foreach ($languages  as  $language) {
            $language_key = $language['language_key'];
            $language_id = $language['id'];
            if ($language_key != "") {
                // laafn ddaau tien 
                // Ve sau thi xoa di
                if ($language['language_image_mobile'] == "") {
                    $language['language_image_mobile'] = $language['language_image'];
                }


                if ($language['language_image_mobile_2'] == "") {
                    $language['language_image_mobile_2'] = $language['language_image_2'];
                }

                if ($language['language_image_mobile_3'] == "") {
                    $language['language_image_mobile_3'] = $language['language_image_3'];
                }
                if ($check_login) {
                    $language['link_edit_language'] = "<a href='/languages/$language_id/edit' class='' target='_blank'>edit</a>";
                } else {
                    $language['link_edit_language'] = "";
                }

                if ($check_mobile) {
                    $language['language_image'] = $language['language_image_mobile'];
                    $language['language_image_2'] = $language['language_image_mobile_2'];
                    $language['language_image_3'] = $language['language_image_mobile_3'];
                }

                $data[$language_key] = $language;
            }
        }
        return $data;
    }

    public function scopeFilter($query, $request)
    {
        $param = $request->all();
        foreach ($param as $field => $value) {
            $method = 'filter' . Str::studly($field);
            if (method_exists($this, $method)) {
                $this->{$method}($query, $value);
            }
        }

        return $query;
    }


    public function filterSearch($query, $value)
    {
        $search_key = $value['value'];
        $search_key = Str::lower($search_key);
        if ($search_key) {
            $query = $query->whereFulltext(['language_key', 'description'], $search_key)
                ->orWhereRaw('lower(language_title) like (?)', ["%{$search_key}%"])
                ->orWhereRaw('lower(language_image) like (?)', ["%{$search_key}%"]);
        }

        return $query;
    }
}
