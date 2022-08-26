<?php

namespace App\Repositories;

use App\Models\MediaImage;
use App\Repositories\BaseRepository;

/**
 * Class MediaImageRepository
 * @package App\Repositories
 * @version July 18, 2022, 10:14 am +07
*/

class MediaImageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'url'
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
        return MediaImage::class;
    }
}
