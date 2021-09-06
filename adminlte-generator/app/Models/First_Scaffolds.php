<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class First_Scaffolds
 * @package App\Models
 * @version September 6, 2021, 1:53 am UTC
 *
 * @property string $name
 * @property string $address
 */
class First_Scaffolds extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'first__scaffolds';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'address' => 'age integer'
    ];

    
}
