<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Experience
 *
 * @property $id
 * @property $position
 * @property $company
 * @property $description
 * @property $fecha_inicio
 * @property $fecha_fin
 * @property $image
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Experience extends Model
{
    //protected $table = "Experience";

    
    static $rules = [
		'position' => 'required',
		'company' => 'required',
		'description' => 'required',
		'fecha_inicio' => 'required',
		'fecha_fin' => 'required',
		'image' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['position','company','description','fecha_inicio','fecha_fin','image'];



}
