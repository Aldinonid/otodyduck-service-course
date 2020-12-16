<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseFlow extends Model
{
    protected $table = 'course_flows';

    protected $fillable = [
        'course_id', 'flow_id'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s'
    ];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function flow()
    {
        return $this->belongsTo('App\Flow');
    }
}
