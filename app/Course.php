<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $guarded = ['id'];
    protected $fillable = [
      'title'
    ];
    public $timestamps = true;

    /**
    * For ajax requests, returns data to JSON format.
    *
    * @var array
    */

    public $result = [];

    /**
    * Creating relation between Student's Model and Course's Model.
    * We've to make 'many-to-many' relations
    *
    * @see https://laravel.com/docs/5.5/eloquent-relationships#many-to-many
    */

    public function students()
    {
        return $this->belongsToMany('App\Student')->withTimestamps();
    }
}
