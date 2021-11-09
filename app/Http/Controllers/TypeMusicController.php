<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeMusic;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\MasterTypeMusic;


class TypeMusicController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function create(MasterTypeMusic $master) {

        $this->data['masterType'] = $master->get();

        return view('manage.typemusic.form', $this->data);
    }

    public function store(Request $req, TypeMusic $typeMusic) {

        $inputs = $req->only('master_type_product_id');
        $inputs['created_at'] = Carbon::now();
        $inputs['created_by'] = $this->user->id;

        $typeMusic->create($inputs);

        return redirect('/home');
    }

    public function edit($id, TypeMusic $typeMusic, MasterTypeMusic $master) {

        $this->data['edit'] = $typeMusic->find($id);
        $this->data['masterType'] = $master->get();

        return view('manage.typemusic.form', $this->data);
    }

    public function update(Request $req, TypeMusic $typeMusic) {

        $inputs = $req->only('master_type_product_id');
        $id = $req->id;

        $data = $typeMusic->find($id);
        $data->update($inputs);

        return redirect('/home');
    }

    public function delete($id, TypeMusic $typeMusic) {

        $data = $typeMusic->find($id);
        $data->delete();

        return redirect('/home');
    }
}
