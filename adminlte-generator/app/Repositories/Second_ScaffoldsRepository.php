<?php

namespace App\Repositories;

use App\Models\Second_Scaffolds;
use App\Repositories\BaseRepository;

/**
 * Class Second_ScaffoldsRepository
 * @package App\Repositories
 * @version September 6, 2021, 1:54 am UTC
*/

class Second_ScaffoldsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'School',
        'Year'
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
        return Second_Scaffolds::class;
    }
}
