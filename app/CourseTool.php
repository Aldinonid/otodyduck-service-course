<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseTool extends Model
{
	protected $table = 'course_tools';

	protected $fillable = [
		'course_id', 'tool_id'
	];

	protected $casts = [
		'created_at' => 'datetime:Y-m-d H:m:s',
		'updated_at' => 'datetime:Y-m-d H:m:s'
	];

	public function course()
	{
		return $this->belongsTo('App\Course');
	}
}
