<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

Class MusicEmbed extends Model
{
    protected $table = 'tb_music_embed';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'embed',
        'music_id',
    ];
}