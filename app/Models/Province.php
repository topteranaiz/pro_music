<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

Class Province extends Model
{
    protected $table = 'tb_province';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'PROVINCE_NAME_TH',
        'PROVINCE_NAME_EN',
    ];
}