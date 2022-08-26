<?php

namespace App\Repositories;

use App\Models\ApiDescription;
use App\Repositories\BaseRepository;

/**
 * Class ApiDescriptionRepository
 * @package App\Repositories
 * @version February 7, 2022, 12:16 pm +07
*/

class ApiDescriptionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'note',
        'status'
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
        return ApiDescription::class;
    }
}
