<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

Class TypeWork extends Model
{
    protected $table = 'type_work';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name_work',
    ];
}