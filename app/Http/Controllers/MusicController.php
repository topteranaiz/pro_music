<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeMusic;
use App\Models\Music;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\MusicEmbed;
use App\Models\MusicAttachment;


class MusicController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            //เรียกข้อมูลคนที่ login เข้ามาในระบบ
            $this->user = Auth::user();
            return $next($request);
        });
    }

    //หน้าโชว์ list รายการ
    public function index(Music $music)
    {
        $this->data['musics'] = $music->where('created_by', $this->user->id)->get();

        return view('manage.music.index', $this->data);
    }

    //หน้าสร้างวงดนตรี
    public function create() {
        return view('manage.music.form');
    }

    //ทำการบันทึกข้อมูล
    public function store(Request $req, Music $music, MusicEmbed $musicEmbed, MusicAttachment $attachment) {

        $inputs = $req->only('name');

        $inputs['created_by'] = $this->user->id;
        $inputs['created_at'] = Carbon::now();

        $newObj = $music->create($inputs);

        if (count($req->embed) > 0) {
            $dataEmbed = $req->embed;
            foreach ($dataEmbed as $key => $item) {
                if (!empty($item)) {
                    $data['embed'] = $item;
                    $data['music_id'] = $newObj->id;
                    //การบันทึก embed
                    $musicEmbed->create($data);
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
                $attach['music_id'] = $newObj->id;
                //บันทึกข้อมูลลงฐานข้อมูล
                $attachment->create($attach);
                $item->move(public_path($filePath) , $filenameWithExtension);
            }
        }


        return redirect('/music');
    }

    //หน้าเรียกข้อมูลที่จะนำไปแก้ไข
    public function edit($id, Music $music) {

        $this->data['edit'] = $music->find($id);

        return view('manage.music.form', $this->data);
    }

    //การอัปเดทช้อมูลที่จะเรานำมาแก้ไข
    public function update(Request $req, Music $music, MusicEmbed $musicEmbed, MusicAttachment $attachment) {

        $inputs = $req->only('name');
        $id = $req->id;

        $dataMusic = $music->find($id);

        $inputs['created_by'] = $this->user->id;
        $inputs['created_at'] = Carbon::now();

        $dataMusic->update($inputs);

        if (count($req->embed) > 0) {
            $dataEmbed = $req->embed;
            foreach ($dataEmbed as $key => $item) {
                if (!empty($item)) {
                    $data['embed'] = $item;
                    $data['music_id'] = $id;
                    //การบันทึก embed
                    $musicEmbed->create($data);
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
                $attach['music_id'] = $id;
                //บันทึกข้อมูลลงฐานข้อมูล
                $attachment->create($attach);
                $item->move(public_path($filePath) , $filenameWithExtension);
            }
        }


        return redirect('/music');
    }

    //การลบข้อมูล
    public function delete($id, Music $music) {

        if ($id) {
            $data = $music->find($id);
            if ($data->getMusicAttachment->count() > 0) {
                foreach($data->getMusicAttachment as $item) {
                    if (!empty($item->path)) {
                        if(file_exists($item->path)){
                            //ลบข้อมูลรูปภาพออกจากเครื่อง
                            unlink(public_path($item->path));
                        }
                    }
                    //ลบข้อมูลออกจากฐานข้อมูล
                    $item->delete();
                }
            }
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
    public function deleteImage($id, MusicAttachment $attachment) {
        $data = $attachment->find($id);
        $music_id = $data->music_id;
        if ($data) {
            if(file_exists($data->path)){
                //ลบข้อมูลรูปภาพออกจากเครื่อง
                unlink(public_path($data->path));
                //ลบข้อมูลออกจากฐานข้อมูล
                $data->delete();
            }
            return redirect()->route('music.edit', [$music_id]);
        }
    }

    //ทำการลบ embed
    public function deleteEmbed($id, MusicEmbed $musicEmbed) {
        $data = $musicEmbed->find($id);
        $music_id = $data->music_id;
        if ($data) {

            $data->delete();

            return redirect()->route('music.edit', [$music_id]);
        }
    }

    //หน้า list รายการรูปภาพ
    public function getImage(MusicAttachment $attachment) {

        $this->data['dataImage'] = $attachment->get();
        return view('manage.image.index', $this->data);
    }

    //กดไปหน้าสร้างรูปภาพ
    public function createImage() {
        return view('manage.image.form');
    }

    //ทำการบันทึกข้อมูล
    public function storeImage(Request $req, MusicAttachment $attachment) {

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
            $attach['created_by'] = $this->user->id;
            //บันทึกข้อมูลลงฐานข้อมูล
            $attachment->create($attach);
            $item->move(public_path($filePath) , $filenameWithExtension);
        }

        return redirect('/music/image');
    }

    //ทำการแก้ไข
    public function editImage($id, MusicAttachment $attachment) {

        $this->data['edit'] = $attachment->find($id);
        return view('manage.image.form', $this->data);
    }

    //ทำการอัปเดทรูปภาพ
    public function updateImage(Request $req, MusicAttachment $attachment) {

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
            $attach['created_by'] = $this->user->id;

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
    public function deleteMusicImage($id, MusicAttachment $attachment) {

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
