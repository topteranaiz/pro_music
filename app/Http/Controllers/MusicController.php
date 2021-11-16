<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeMusic;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Performance;
use App\Models\PerformanceVideo;
use App\Models\PerformancePicture;


class MusicController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            //เรียกข้อมูลคนที่ login เข้ามาในระบบ
            $this->user = session()->get('data');
            return $next($request);
        });
    }

    //หน้าโชว์ list รายการ
    public function index(Performance $performance)
    {
        
        $this->data['musics'] = $performance->where('band_id', $this->user->band_id)->get();

        return view('manage.music.index', $this->data);
    }

    //หน้าสร้างวงดนตรี
    public function create() {
        return view('manage.music.form');
    }

    //ทำการบันทึกข้อมูล
    public function store(Request $req, Performance $performance, PerformanceVideo $video, PerformancePicture $attachment) {

        $inputs = $req->only('name');

        $inputs['band_id'] = $this->user->band_id;
        $inputs['created_at'] = Carbon::now();

        $newObj = $performance->create($inputs);

        if (count($req->embed) > 0) {
            $dataEmbed = $req->embed;
            foreach ($dataEmbed as $key => $item) {
                if (!empty($item)) {
                    $data['link'] = $item;
                    $data['performance_id'] = $newObj->id;
                    //การบันทึก embed
                    $video->create($data);
                }
            }
        }

        //ทำการบันทึกรูปภาพลงในเครื่อง
        if ($req->hasFile('image')) {
            foreach($req->file('image') as $key => $item){
                $filePath = 'image/product';
                $this->createFolder($filePath);
                $ext = $item->getClientOriginalExtension();
                $size = \File::size($item);
                $oldFilename = $item->getClientOriginalName();
                $filename = $this->generateFilename(public_path($filePath));
                $filenameWithExtension = $filename . '.' . $ext;
                $attach['path'] = $filePath . '/' . $filenameWithExtension;
                $attach['performance_id'] = $newObj->id;
                //บันทึกข้อมูลลงฐานข้อมูล
                $attachment->create($attach);
                $item->move(public_path($filePath) , $filenameWithExtension);
            }
        }


        return redirect('/music');
    }

    //หน้าเรียกข้อมูลที่จะนำไปแก้ไข
    public function edit($id, Performance $performance) {

        $this->data['edit'] = $performance->find($id);

        return view('manage.music.form', $this->data);
    }

    //การอัปเดทช้อมูลที่จะเรานำมาแก้ไข
    public function update(Request $req, Performance $performance, PerformanceVideo $video, PerformancePicture $attachment) {

        $inputs = $req->only('name');
        $id = $req->id;

        $dataMusic = $performance->find($id);

        $inputs['band_id'] = $this->user->band_id;
        $inputs['updated_at'] = Carbon::now();

        $dataMusic->update($inputs);

        if (count($req->embed) > 0) {
            $dataEmbed = $req->embed;
            foreach ($dataEmbed as $key => $item) {
                if (!empty($item)) {
                    $data['link'] = $item;
                    $data['performance_id'] = $id;
                    //การบันทึก embed
                    $video->create($data);
                }
            }
        }
        //ทำการบันทึกรูปภาพลงในเครื่อง
        if ($req->hasFile('image')) {
            foreach($req->file('image') as $key => $item){
                $filePath = 'image/product';
                $this->createFolder($filePath);
                $ext = $item->getClientOriginalExtension();
                $size = \File::size($item);
                $oldFilename = $item->getClientOriginalName();
                $filename = $this->generateFilename(public_path($filePath));
                $filenameWithExtension = $filename . '.' . $ext;
                $attach['path'] = $filePath . '/' . $filenameWithExtension;
                $attach['performance_id'] = $id;
                //บันทึกข้อมูลลงฐานข้อมูล
                $attachment->create($attach);
                $item->move(public_path($filePath) , $filenameWithExtension);
            }
        }


        return redirect('/music');
    }

    //การลบข้อมูล
    public function delete($id, Performance $performance) {

        if ($id) {
            $data = $performance->find($id);
            // if ($data->getMusicAttachment->count() > 0) {
            //     foreach($data->getMusicAttachment as $item) {
            //         if (!empty($item->path)) {
            //             if(file_exists($item->path)){
            //                 //ลบข้อมูลรูปภาพออกจากเครื่อง
            //                 unlink(public_path($item->path));
            //             }
            //         }
            //         //ลบข้อมูลออกจากฐานข้อมูล
            //         $item->delete();
            //     }
            // }
            //ทำการลบ embed
            if ($data->getMusicEmbed->count() > 0) {
                foreach ($data->getMusicEmbed as $item) {
                    $item->delete();
                }
            }
            $data->delete();
        }

        return redirect('/music');
    }

    //การลบรูปภาพ
    // public function deleteImage($id, MusicAttachment $attachment) {
    //     $data = $attachment->find($id);
    //     $music_id = $data->music_id;
    //     if ($data) {
    //         if(file_exists($data->path)){
    //             //ลบข้อมูลรูปภาพออกจากเครื่อง
    //             unlink(public_path($data->path));
    //             //ลบข้อมูลออกจากฐานข้อมูล
    //             $data->delete();
    //         }
    //         return redirect()->route('music.edit', [$music_id]);
    //     }
    // }

    //ทำการลบ embed
    public function deleteEmbed($id, PerformanceVideo $video) {
        $data = $video->find($id);
        $performance_id = $data->performance_id;
        if ($data) {

            $data->delete();

            return redirect()->route('music.edit', [$performance_id]);
        }
    }

    //หน้า list รายการรูปภาพ
    public function getImage(PerformancePicture $attachment) {

        $this->data['dataImage'] = $attachment->where('band_id', $this->user->band_id)->get();
        return view('manage.image.index', $this->data);
    }

    //กดไปหน้าสร้างรูปภาพ
    public function createImage() {
        return view('manage.image.form');
    }

    //ทำการบันทึกข้อมูล
    public function storeImage(Request $req, PerformancePicture $attachment) {

        //ทำการบันทึกรูปภาพลงในเครื่อง
        if ($req->hasFile('image')) {
            $item = $req->file('image');
            $filePath = 'image/music';
            $this->createFolder($filePath);
            $ext = $item->getClientOriginalExtension();
            $size = \File::size($item);
            $oldFilename = $item->getClientOriginalName();
            $filename = $this->generateFilename(public_path($filePath));
            $filenameWithExtension = $filename . '.' . $ext;
            $attach['path'] = $filePath . '/' . $filenameWithExtension;
            $attach['band_id'] = $this->user->band_id;
            //บันทึกข้อมูลลงฐานข้อมูล
            $attachment->create($attach);
            $item->move(public_path($filePath) , $filenameWithExtension);
        }

        return redirect('/music/image');
    }

    //ทำการแก้ไข
    public function editImage($id, PerformancePicture $attachment) {

        $this->data['edit'] = $attachment->find($id);
        return view('manage.image.form', $this->data);
    }

    //ทำการอัปเดทรูปภาพ
    public function updateImage(Request $req, PerformancePicture $attachment) {

        $id = $req->id;
        $dataAttach = $attachment->find($id);

        //ทำการเซฟรูปลงเครื่อง
        if ($req->hasFile('image')) {
            $item = $req->file('image');
            $filePath = 'image/music';
            $this->createFolder($filePath);
            $ext = $item->getClientOriginalExtension();
            $size = \File::size($item);
            $oldFilename = $item->getClientOriginalName();
            $filename = $this->generateFilename(public_path($filePath));
            $filenameWithExtension = $filename . '.' . $ext;
            $attach['path'] = $filePath . '/' . $filenameWithExtension;
            $attach['band_id'] = $this->user->band_id;

            if ($dataAttach) {
                //check ถ้ามีรูปภาพเก่าให้ลบก่อน
                if(file_exists($dataAttach->path)){
                    //ลบข้อมูลรูปภาพออกจากเครื่อง
                    unlink(public_path($dataAttach->path));
                }
                $dataAttach->delete();
            }
            //สร้างรูปภาพลงฐานข้อมูล
            $attachment->create($attach);
            $item->move(public_path($filePath) , $filenameWithExtension);
        }

        return redirect('/music/image');
    }

    //การลบรูปภาพ
    public function deleteMusicImage($id, PerformancePicture $attachment) {

        if ($id) {
            $data = $attachment->find($id);
            if (!empty($data->path)) {
                if(file_exists($data->path)){
                    //ลบข้อมูลรูปภาพออกจากเครื่อง
                    unlink(public_path($data->path));
                }
            }
            //ลบข้อมูลออกจากฐานข้อมูล
            $data->delete();
        }

        return redirect('/music/image');
    }
}
