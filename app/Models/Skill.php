<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Skill
 *
 * @property $id
 * @property $title
 * @property $rate
 * @property $skill_category_id
 * @property $created_at
 * @property $updated_at
 *
 * @property SkillCategory $skillCategory
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Skill extends Model
{
    //protected $table = "Skill";

    
    static $rules = [
		'title' => 'required',
		'rate' => 'required',
		'skill_category_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','rate','skill_category_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function skillCategory()
    {
        return $this->hasOne('App\Models\SkillCategory', 'id', 'skill_category_id');
    }
    

}
