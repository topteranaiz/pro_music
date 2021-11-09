<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterTypeMusic;

Class TypeMusic extends Model
{
    protected $table = 'tb_type_music';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'master_type_product_id',
        'created_at',
        'created_by'
    ];

    public function getMasterType() {
        return $this->belongsTo(MasterTypeMusic::class, 'master_type_product_id', 'id');
    }
}