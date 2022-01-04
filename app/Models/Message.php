<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $message
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Message extends Model
{
    //protected $table = "Message";

    
    static $rules = [
		'name' => 'required',
		'email' => 'required',
		'message' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','email','message'];



}
