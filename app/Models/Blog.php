<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Blog
 *
 * @property $id
 * @property $title
 * @property $description
 * @property $datetime
 * @property $author
 * @property $short_description
 * @property $visits
 * @property $meta_keywords
 * @property $image
 * @property $blog_category_id
 * @property $created_at
 * @property $updated_at
 *
 * @property BlogCategory $blogCategory
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Blog extends Model
{
    //protected $table = "Blog";

    
    static $rules = [
		'title' => 'required',
		'description' => 'required',
		'datetime' => '',
		'author' => 'required',
		'short_description' => 'required',
		'visits' => '',
		'meta_keywords' => 'required',
		'image' => '',
		'blog_category_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','datetime','author','short_description','visits','meta_keywords','image','blog_category_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function blogCategory()
    {
        return $this->hasOne('App\Models\BlogCategory', 'id', 'blog_category_id');
    }
    

}
