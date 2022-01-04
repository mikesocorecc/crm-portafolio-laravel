<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SkillCategory
 *
 * @property $id
 * @property $title
 * @property $created_at
 * @property $updated_at
 *
 * @property Skill[] $skills
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SkillCategory extends Model
{
    //protected $table = "SkillCategory";

    
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


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function skills()
    {
        return $this->hasMany('App\Models\Skill', 'skill_category_id', 'id');
    }
    

}
