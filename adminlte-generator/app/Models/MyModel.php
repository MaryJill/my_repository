<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MyModel
 * @package App\Models
 * @version September 6, 2021, 1:52 am UTC
 *
 * @property string $name
 * @property string $address
 * @property integer $age
 */
class MyModel extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'my_models';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'address',
        'age'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'address' => 'string',
        'age' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
