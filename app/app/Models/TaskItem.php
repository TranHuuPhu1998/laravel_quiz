<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskItem extends Model
{
    protected $table = "taskitem";
    protected $fillable = [
        'taskid',
        'taskname'
    ];
}
