<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BlogCategory
 *
 * @property $id
 * @property $title
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class BlogCategory extends Model
{
    //protected $table = "BlogCategory";

    
    static $rules = [
		'title' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];



}
