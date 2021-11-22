<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


Class Status extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'status_id';
    public $timestamps = false;

    protected $fillable = [
        'status_name',
    ];
}