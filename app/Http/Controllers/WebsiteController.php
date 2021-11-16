<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeMusic;
use App\Models\Music;
use Carbon\Carbon;
use App\Models\Province;
use App\Models\Band;
use App\Models\MasterTypeMusic;
use App\User;

class WebsiteController extends Controller
{
    //หน้ารายการวงดนตรี
    public function index(Band $band) {
        $inputs = request()->input();

        //ค้นหาชื่อวงดนตรี
        if (isset($inputs['name'])) {
            $band = $band->where('band_name','LIKE','%' . trim($inputs['band_name']) . '%');

        }

        //ค้นหาประเภทรถแห่
        // if (isset($inputs['type_car_audio'])) {
        //     $band = $band->where('type_car_audio',$inputs['type_car_audio']);
        // }

        //ค้นหาภูมิภาค
        if (isset($inputs['area_id'])) {
            $band = $band->where('area_id',$inputs['area_id']);
        }

        // $this->data['dataMasterType'] = $master->get();
        $this->data['dataMusics'] = $band->get();

        return view('template.pages.main', $this->data);
    }

    //หน้ารายละเอียดวงดนตรี
    public function detail($id, Band $band) {

        $this->data['detail'] = $band->find($id);

        return view('template.pages.detail', $this->data);
    }
}
