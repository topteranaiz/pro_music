<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeMusic;
use App\User;
use Carbon\Carbon;
use App\Models\Province;

class ProfileController extends Controller
{

    public function edit($id, User $user, Province $province) {

        $this->data['edit'] = $user->find($id);
        $this->data['province'] = $province->get();

        return view('manage.profile', $this->data);
    }

    public function update(Request $req, User $user) {

        $inputs = $req->only('name', 'email', 'address', 'detail', 'tel', 'area_id', 'type_car_audio', 'amount_people');
        $id = $req->id;
        if (!empty($req->password)) {
            $inputs['password'] = Hash::make($req->password);
        }

        $data = $user->find($id);
        $data->update($inputs);

        if ($req->hasFile('image_car_audio')) {
            $item = $req->file('image_car_audio');
            $filePath = 'image_car_audio/profile';
            $this->createFolder($filePath);
            $ext = $item->getClientOriginalExtension();
            $size = \File::size($item);
            $oldFilename = $item->getClientOriginalName();
            $filename = $this->generateFilename(public_path($filePath));
            $filenameWithExtension = $filename . '.' . $ext;
            $attach['image_car_audio'] = $filePath . '/' . $filenameWithExtension;
            $data->update($attach);
            $item->move(public_path($filePath) , $filenameWithExtension);
        }

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

        return redirect('/home');
    }

}
