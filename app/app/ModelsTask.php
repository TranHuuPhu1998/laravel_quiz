<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelsTask extends Model
{
    protected $table = "task";
    protected $fillable = [
        'title',
        'description',
        'content',
        'status',
    ];
}
