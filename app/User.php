<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Music;
use App\Models\MusicAttachment;
use App\Models\Job;
class User extends Authenticatable
{
    use Notifiable;

    protected $guard = 'users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'name', 
        'username', 
        'password', 
        'tel', 
        'address', 
        'image', 
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getMusic() {
        return $this->hasMany(Music::class, 'created_by', 'id');
    }

    public function getMusicAttachment() {
        return $this->hasMany(MusicAttachment::class, 'created_by', 'id');
    }

    public function getTypeCarAudio() {
        if ($this->type_car_audio == 1) {
            return 'รถแห่ 6 ล้อขนาดใหญ่ พร้อมให้ความบันเทิงอย่างเต็มรูปแบบแสงสีเสียงขั้นอลังการ';
        }else if($this->type_car_audio == 2) {
            return 'รถแห่เล็ก สนุกได้แบบกระทัดรัด สนุกได้ทุกพื้นที่';
        }else if($this->type_car_audio == 3) {
            return 'ทีมงานน้อยแต่มีคุณภาพพร้อมเสิร์ฟความบันเทิงอย่างสุดเหวี่ยง';
        }else {
            return '-';
        }
    }

    public function getJob() {
        return $this->hasMany(Job::class, 'user_id', 'user_id');
    }
}
