<?php

namespace App\Repositories;

use App\Models\First_Scaffolds;
use App\Repositories\BaseRepository;

/**
 * Class First_ScaffoldsRepository
 * @package App\Repositories
 * @version September 6, 2021, 1:53 am UTC
*/

class First_ScaffoldsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address'
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
        return First_Scaffolds::class;
    }
}
