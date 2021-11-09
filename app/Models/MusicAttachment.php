<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

Class MusicAttachment extends Model
{
    protected $table = 'tb_music_attachment';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'path',
        'created_by'
    ];
}