<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypeWork;
use App\Models\Job;
Class TypeMusicJoin extends Model
{
    protected $table = 'type_music_join';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'type_work_id',
        'band_id',
        'price',
        'detail'
    ];

    public function getTypeWork() {
        return $this->belongsTo(TypeWork::class, 'type_work_id', 'id');
    }

    public function getJob() {
        return $this->hasMany(Job::class, 'type_music_join_id', 'id');
    }
}