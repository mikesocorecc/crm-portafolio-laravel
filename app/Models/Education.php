<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Education
 *
 * @property $id
 * @property $school
 * @property $speciality
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
class Education extends Model
{
    protected $table = "educations";
    
    static $rules = [
		'school' => 'required',
		'speciality' => 'required',
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
    protected $fillable = ['school','speciality','description','fecha_inicio','fecha_fin','image'];



}
