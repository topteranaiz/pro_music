<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\MusicEmbed;
use App\Models\PerformancePicture;
use App\Models\Performance;
use App\Models\TypeMusicJoin;
use App\Models\Comment;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


Class Band extends Authenticatable
{
    use Notifiable;

    protected $table = 'band';
    protected $primaryKey = 'band_id';
    protected $guard = 'bands';

    public $timestamps = false;

    protected $fillable = [
        'band_name',
        'username',
        'password',
        'address',
        'tel',
        'profile',
        'detail',
        'area_id',
        'created_at',
        'updated_at'
    ];

    public function getMusic() {
        return $this->hasMany(Performance::class, 'band_id', 'band_id');
    }

    // public function getMusicEmbed() {
    //     return $this->hasMany(MusicEmbed::class, 'music_id', 'id');
    // }

    public function getMusicAttachment() {
        return $this->hasMany(PerformancePicture::class, 'band_id', 'band_id');
    }

    public function getTypeMusicJoin() {
        return $this->hasMany(TypeMusicJoin::class, 'band_id', 'band_id');
    }

    public function getComment() {
        return $this->hasMany(Comment::class, 'band_id', 'band_id');
    }
}