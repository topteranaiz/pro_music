<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

Class PerformanceVideo extends Model
{
    protected $table = 'performance_vido';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'link',
        'performance_id',
    ];
}