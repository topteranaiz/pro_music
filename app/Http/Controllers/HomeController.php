<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeMusicJoin;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            // $this->user = Auth::user();
            $this->user = session()->get('data');
            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(TypeMusicJoin $join)
    {
        $this->data['dataTypeMusics'] = $join->where('band_id', $this->user->band_id)->get();

        return view('manage.typemusic.index', $this->data);
    }

    public function detail1()
    {
        return view('template.pages.detail');
    }

    public function detail2()
    {
        return view('template.pages.detail2');
    }

    public function detail3()
    {
        return view('template.pages.detail3');
    }
}
