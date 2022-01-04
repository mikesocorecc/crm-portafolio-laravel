<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 *
 * @property $id
 * @property $title
 * @property $image
 * @property $link
 * @property $datetime
 * @property $description
 * @property $project_category_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Project extends Model
{
    
    static $rules = [
		'title' => 'required',
		'image' => '',
		'link' => 'required',
		'datetime' => 'required',
		'description' => 'required',
		'project_category_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','image','link','datetime','description','project_category_id'];



}
