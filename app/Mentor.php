<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
	protected $table = 'mentors';

	protected $casts = [
		'created_at' => 'datetime:Y-m-d H:i:s',
		'updated_at' => 'datetime:Y-m-d H:i:s'
	];

	protected $fillable = [
		'name', 'profile', 'email', 'job'
	];
}
