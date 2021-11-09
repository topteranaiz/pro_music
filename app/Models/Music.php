<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\MusicEmbed;
use App\Models\MusicAttachment;


Class Music extends Model
{
    protected $table = 'tb_music';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'created_at',
        'created_by',
        'updated_at'
    ];

    public function getMusicEmbed() {
        return $this->hasMany(MusicEmbed::class, 'music_id', 'id');
    }

    public function getMusicAttachment() {
        return $this->hasMany(MusicAttachment::class, 'music_id', 'id');
    }
}