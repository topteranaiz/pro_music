<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypeMusicJoin;
use App\Models\Status;
use App\Models\Band;

Class Job extends Model
{
    protected $table = 'jobs';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'type_music_join_id',
        'date',
        'band_id',
        'user_id',
        'detail',
        'status'
    ];

    public function getTypeMusicJoin() {
        return $this->belongsTo(TypeMusicJoin::class, 'type_music_join_id', 'id');
    }

    public function getStatus() {
        return $this->belongsTo(Status::class, 'status', 'status_id');
    }

    public function getBand() {
        return $this->belongsTo(Band::class, 'band_id', 'band_id');
    }
}