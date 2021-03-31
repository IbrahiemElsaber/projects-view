<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    protected $fillable = ['status', 'project_id'];
//
    const STATUS = [
        1 => 'toDo',
        2 => 'onProgress',
        3 => 'finish',
    ];

    public static function getStatusID($status)
    {
        return array_search($status, self::STATUS, true);
    }

    public function getStatusAttribute()
    {
        return self::STATUS[$this->attributes['status']];
    }

    public function setStatusAttribute($value)
    {
        $status = self::getStatusID($value);
        if ($status) {
            $this->attributes['status'] = $status;
        }
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function getDoneTasksPercentage(){
        $doneTasks = DB::table('tasks')->where('status', '=', 3)
            ->get();
        $allTasks = DB::table('tasks')
            ->get();
        return ($doneTasks->count() / $allTasks->count()) * 100;
    }
}
