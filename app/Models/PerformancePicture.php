<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

Class PerformancePicture extends Model
{
    protected $table = 'performance_picture';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'path',
        'band_id'
    ];
}