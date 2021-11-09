<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

Class MasterTypeMusic extends Model
{
    protected $table = 'tb_master_type_music';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'title',
    ];
}