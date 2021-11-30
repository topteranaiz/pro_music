<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeMusic;
use App\Models\Music;
use Carbon\Carbon;
use App\Models\Province;
use App\Models\Band;
use App\Models\Comment;
use App\Models\Job;
use App\Models\TypeWork;


use App\Models\MasterTypeMusic;
use App\User;

class WebsiteController extends Controller
{
    //หน้ารายการวงดนตรี
    public function index(Band $band, TypeWork $typeWork, Job $job) {
        $inputs = request()->input();
        $priceStart = request()->input('priceStart');
        $priceEnd = request()->input('priceEnd');

        //ค้นหาชื่อวงดนตรี
        if (isset($inputs['name'])) {
            $band = $band->where('band_name','LIKE','%' . trim($inputs['name']) . '%');
        }

        if(isset($inputs['type_work_id'])) {
            $typework = $inputs['type_work_id'];
            $band = $band->whereHas('getTypeMusicJoin', function($query) use($typework) {
                $query->where('type_work_id', $typework);
            });
        }

        if(isset($inputs['date'])) {
            $date = $inputs['date'];
            $dataJob = $job->where('date', $date)->pluck('band_id');
            if (count($dataJob) > 0) {
                $band = $band->whereNotIn('band_id', [$dataJob]);
            }
        }

        if(!empty($priceStart)) {
            $band = $band->whereHas('getTypeMusicJoin', function($query) use($priceStart) {
                $query->where('price', '>=',$priceStart);
            });
        }

        if(!empty($priceEnd)) {
            $band = $band->whereHas('getTypeMusicJoin', function($query) use($priceEnd) {
                $query->where('price', '<=',$priceEnd);
            });
        }

        if(!empty($priceStart) && !empty($priceEnd)) {
            $band = $band->whereHas('getTypeMusicJoin', function($query) use($priceStart, $priceEnd) {
                $query->whereBetween('price',array($priceStart, $priceEnd));
            });
        }

        //ค้นหาประเภทรถแห่
        // if (isset($inputs['type_car_audio'])) {
        //     $band = $band->where('type_car_audio',$inputs['type_car_audio']);
        // }

        //ค้นหาภูมิภาค
        if (isset($inputs['area_id'])) {
            $band = $band->where('area_id',$inputs['area_id']);
        }

        $this->data['dataTypeWork'] = $typeWork->get();
        $this->data['dataMusics'] = $band->get();

        return view('template.pages.main', $this->data);
    }

    //หน้ารายละเอียดวงดนตรี
    public function detail($id, Band $band) {

        $this->data['detail'] = $band->find($id);

        return view('template.pages.detail', $this->data);
    }

    public function contract(Request $req, Job $job) {

        $inputs = $req->only('band_id', 'user_id', 'date', 'type_music_join_id', 'detail');
        $inputs['status'] = 1;
        $dataJob = $job->where('band_id', $inputs['band_id'])->where('date', $inputs['date'])->first();

        if (!empty($dataJob)) {
            return redirect()->back()->withInput()->with('error', 'คิวงานสำหรับวันที่ '.$inputs['date'].' ไม่ว่าง'); 
        }

        $job->create($inputs);
        return redirect()->back()->withInput()->with('success', 'บันทึกเรียบร้อยแล้ว'); 
    }

    public function storeComment(Comment $comment, Request $req) {

        $inputs = $req->only('user_id', 'band_id', 'comment');

        $inputs['created_at'] = Carbon::now();
        $comment->create($inputs);

        return redirect()->back()->withInput()->with('success', 'บันทึกเรียบร้อยแล้ว'); 
    }
}
