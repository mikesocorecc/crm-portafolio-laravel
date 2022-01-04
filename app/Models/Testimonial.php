<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Testimonial
 *
 * @property $id
 * @property $name
 * @property $position
 * @property $message
 * @property $rating
 * @property $image
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Testimonial extends Model
{
    //protected $table = "Testimonial";

    
    static $rules = [
		'name' => 'required',
		'position' => 'required',
		'message' => 'required',
		'rating' => 'required',
		'image' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','position','message','rating','image'];



}
