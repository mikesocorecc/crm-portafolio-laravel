<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class About
 *
 * @property $id
 * @property $key
 * @property $value
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class About extends Model
{
    //protected $table = "About";

    public $primaryKey = 'key';
    public $incrementing = false;
    static $rules = [
      'about_me' => '',
      'address' => '',
      'avatar' => '',
      'behance' => '',
      'codepen' => '',
      'dribbble' => '',
      'dropbox' => '',
      'email' => '',
      'facebook' => '',
      'flickr' => '',
      'google_plus' => '',
      'instagram' => '',
      'latitude' => '',
      'linkedin' => '',
      'longitude' => '',
      'name' => '',
      'nationality' => '',
      'num_awards' => '',
      'num_experience' => '',
      'num_happy_clients' => '',
      'num_meetings' => '',
      'num_projects' => '',
      'phone' => '',
      'pinterest' => '',
      'position_typing' => '',
      'reddit' => '',
      'resume' => '',
      'rss' => '',
      'skype' => '',
      'snapchat' => '',
      'soundcloud' => '',
      'stackoverfolw' => '',
      'tumblr' => '',
      'twitter' => '',
      'video_link' => '',
      'vimeo' => '',
      'yelp' => '',
      'youtube' => ''
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['key','value'];



}
