<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Second_Scaffolds
 * @package App\Models
 * @version September 6, 2021, 1:54 am UTC
 *
 * @property string $School
 * @property level $Year
 */
class Second_Scaffolds extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'second__scaffolds';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'School',
        'Year'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'School' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Year' => 'Grade'
    ];

    
}
