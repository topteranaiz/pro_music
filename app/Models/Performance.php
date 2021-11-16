<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\PerformanceVideo;
use App\Models\PerformancePicture;


Class Performance extends Model
{
    protected $table = 'performance';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'band_id',
        'created_at',
        'updated_at',
    ];

    public function getMusicEmbed() {
        return $this->hasMany(PerformanceVideo::class, 'performance_id', 'id');
    }

    public function getMusicAttachment() {
        return $this->hasMany(PerformancePicture::class, 'performance_id', 'id');
    }
}