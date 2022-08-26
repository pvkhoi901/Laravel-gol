<?php

namespace App\Repositories;

use App\Models\UserManager;
use App\Repositories\BaseRepository;

/**
 * Class UserManagerRepository
 * @package App\Repositories
 * @version January 28, 2022, 2:17 pm +07
*/

class UserManagerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'theme',
        'remember_token'
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
        return UserManager::class;
    }
}
