<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


Class Job extends Model
{
    protected $table = 'jobs';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'type_music_join_id',
        'date',
        'created_at',
        'band_id',
        'user_id',
        'detail'
    ];
}