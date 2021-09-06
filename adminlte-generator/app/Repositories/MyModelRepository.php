<?php

namespace App\Repositories;

use App\Models\MyModel;
use App\Repositories\BaseRepository;

/**
 * Class MyModelRepository
 * @package App\Repositories
 * @version September 6, 2021, 1:52 am UTC
*/

class MyModelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'age'
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
        return MyModel::class;
    }
}
