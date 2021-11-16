<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeWork;
use App\Models\TypeMusicJoin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\MasterTypeMusic;


class TypeMusicController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = session()->get('data');
            return $next($request);
        });
    }

    public function create(TypeWork $master) {

        $this->data['masterType'] = $master->get();

        return view('manage.typemusic.form', $this->data);
    }

    public function store(Request $req, TypeMusicJoin $join) {

        $inputs = $req->only('type_work_id', 'price');
        $inputs['band_id'] = $this->user->band_id;

        $join->create($inputs);

        return redirect('/home');
    }

    public function edit($id, TypeMusicJoin $join, TypeWork $master) {

        $this->data['edit'] = $join->find($id);
        $this->data['masterType'] = $master->get();

        return view('manage.typemusic.form', $this->data);
    }

    public function update(Request $req, TypeMusicJoin $join) {

        $inputs = $req->only('type_work_id', 'price');
        $id = $req->id;

        $data = $join->find($id);
        $data->update($inputs);

        return redirect('/home');
    }

    public function delete($id, TypeMusicJoin $join) {

        $data = $join->find($id);
        $data->delete();

        return redirect('/home');
    }
}
