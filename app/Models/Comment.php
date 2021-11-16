<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


Class Comment extends Model
{
    protected $table = 'comment';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'job_id',
        'comment',
        'user_id',
    ];
}