<?php

namespace App\Repositories;

use App\Models\EmailMarketing;
use App\Repositories\BaseRepository;

/**
 * Class EmailMarketingRepository
 * @package App\Repositories
 * @version March 15, 2022, 11:27 am +07
 */

class EmailMarketingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'email_content'
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
        return EmailMarketing::class;
    }
}
