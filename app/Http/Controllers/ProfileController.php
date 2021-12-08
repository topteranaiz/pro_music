<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeMusic;
use App\Models\Band;
use App\User;
use Carbon\Carbon;

class ProfileController extends Controller
{

    public function editBand($id, Band $band) {

        $this->data['edit'] = $band->find($id);

        return view('manage.profile.band', $this->data);
    }

    public function editUser($id, User $user) {

        $this->data['edit'] = $user->find($id);
        

        return view('manage.profile.user', $this->data);
    }

    public function updateBand(Request $req, Band $band) {

        $inputs = $req->only('band_name', 'username', 'address', 'detail', 'tel', 'area_id');
        $id = $req->id;
        if (!empty($req->password)) {
            if ($req->password != $req->confirmed) {
                return redirect()->back()->withInput()->with('error', 'รหัสผ่านไม่ตรงกัน'); 
            }
            $inputs['password'] = Hash::make($req->password);
        }

        $data = $band->find($id);
        $data->update($inputs);

        // if ($req->hasFile('image_car_audio')) {
        //     $item = $req->file('image_car_audio');
        //     $filePath = 'image_car_audio/profile';
        //     $this->createFolder($filePath);
        //     $ext = $item->getClientOriginalExtension();
        //     $size = \File::size($item);
        //     $oldFilename = $item->getClientOriginalName();
        //     $filename = $this->generateFilename(public_path($filePath));
        //     $filenameWithExtension = $filename . '.' . $ext;
        //     $attach['image_car_audio'] = $filePath . '/' . $filenameWithExtension;
        //     $data->update($attach);
        //     $item->move(public_path($filePath) , $filenameWithExtension);
        // }

        if ($req->hasFile('image')) {
            $item = $req->file('image');
            $filePath = 'image/profile';
            $this->createFolder($filePath);
            $ext = $item->getClientOriginalExtension();
            $size = \File::size($item);
            $oldFilename = $item->getClientOriginalName();
            $filename = $this->generateFilename(public_path($filePath));
            $filenameWithExtension = $filename . '.' . $ext;
            $attach['profile'] = $filePath . '/' . $filenameWithExtension;
            $data->update($attach);
            $item->move(public_path($filePath) , $filenameWithExtension);
        }

        return redirect('/home');
    }

    public function updateUser(Request $req, User $user) {

        $inputs = $req->only('name', 'username', 'address', 'tel');
        $id = $req->id;
        if (!empty($req->password)) {
            if ($req->password != $req->confirmed) {
                return redirect()->back()->withInput()->with('error', 'รหัสผ่านไม่ตรงกัน'); 
            }
            $inputs['password'] = Hash::make($req->password);
        }

        $data = $user->find($id);
        $data->update($inputs);

        if ($req->hasFile('image')) {
            $item = $req->file('image');
            $filePath = 'image/profile';
            $this->createFolder($filePath);
            $ext = $item->getClientOriginalExtension();
            $size = \File::size($item);
            $oldFilename = $item->getClientOriginalName();
            $filename = $this->generateFilename(public_path($filePath));
            $filenameWithExtension = $filename . '.' . $ext;
            $attach['image'] = $filePath . '/' . $filenameWithExtension;
            $data->update($attach);
            $item->move(public_path($filePath) , $filenameWithExtension);
        }

        return redirect()->back();
    }

}
