<?php

namespace App\Repositories;

use App\Models\Languages;
use App\Repositories\BaseRepository;

/**
 * Class LanguagesRepository
 * @package App\Repositories
 * @version January 27, 2022, 9:47 am +07
*/

class LanguagesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'country',
        'language_key',
        'language_title',
        'language_image',
        'language_url',
        'description'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Languages::class;
    }
}
