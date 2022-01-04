<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 *
 * @property $id
 * @property $value
 * @property $default_value
 * @property $required
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Setting extends Model
{
    //protected $table = "Setting";
    public $primaryKey = 'key';
    public $incrementing = false;
    static $rules = [
      'about_bg' => '',
      'alert' => '',
      'blog_categories_widget' => '',
      'blog_comments_widget' => '',
      'blog_latest_widget' => '',
      'blog_popular_widget' => '',
      'blog_search_wedgit' => '',
      'color' => '',
      'contact_bg' => '',
      'copyright' => '',
      'favicon' => '',
      'home_bg' => '',
      'language' => '',
      'meta_description' => '',
      'meta_keywords' => '',
      'portfolio_comments' => '',
      'portfolio_related' => '',
      'post_latest_widget' => '',
      'post_related_widget' => '',
      'post_search_widget' => '',
      'post_tags_widget' => '',
      'title' => '',
      'webmaster_email' => ''
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['key','value','default_value','required'];



}
