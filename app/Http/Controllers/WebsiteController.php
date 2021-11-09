<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeMusic;
use App\Models\Music;
use Carbon\Carbon;
use App\Models\Province;
use App\Models\MasterTypeMusic;
use App\User;

class WebsiteController extends Controller
{
    //หน้ารายการวงดนตรี
    public function index(Music $music, TypeMusic $typeMusic, MasterTypeMusic $master, User $user) {
        $inputs = request()->input();

        //ค้นหาชื่อวงดนตรี
        if (isset($inputs['name'])) {
            $user = $user->where('name','LIKE','%' . trim($inputs['name']) . '%');

        }

        //ค้นหาประเภทรถแห่
        if (isset($inputs['type_car_audio'])) {
            $user = $user->where('type_car_audio',$inputs['type_car_audio']);
        }

        //ค้นหาภูมิภาค
        if (isset($inputs['area_id'])) {
            $user = $user->where('area_id',$inputs['area_id']);
        }

        $this->data['dataMasterType'] = $master->get();
        $this->data['dataMusics'] = $user->where('type_personal_id', 1)->get();

        return view('template.pages.main', $this->data);
    }

    //หน้ารายละเอียดวงดนตรี
    public function detail($id, User $user) {

        $this->data['detail'] = $user->find($id);

        return view('template.pages.detail', $this->data);
    }
}
