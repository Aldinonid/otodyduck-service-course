<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	protected $table = 'courses';

	protected $casts = [
		'created_at' => 'datetime:Y-m-d H:m:s',
		'updated_at' => 'datetime:Y-m-d H:m:s'
	];

	protected $fillable = [
		'name', 'slug', 'certificate', 'thumbnail', 'type', 'status', 'price', 'level', 'description', 'mentor_id'
	];

	public function mentor()
	{
		return $this->belongsTo('App\Mentor');
	}

	public function chapter()
	{
		return $this->hasMany('App\Chapter')->orderBy('id', 'ASC');
	}

	public function images()
	{
		return $this->hasMany('App\ImageCourse')->orderBy('id', 'DESC');
	}
}
