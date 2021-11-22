<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\User;

Class Comment extends Model
{
    protected $table = 'comment';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'band_id',
        'comment',
        'user_id',
        'created_at'
    ];

    public function getUser() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}