<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Band;
use App\User;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Auth;
use Carbon\Carbon;


class LoginController extends Controller
{

    public function index() {
        return view('home');
    }

    public function storeRegister(Request $req, User $user, Band $band) {
        
        $inputs = $req->all();

        $dataBand = $band->where('username', $inputs['username'])->first();
        $dataUser = $user->where('username', $inputs['username'])->first();


        if (!empty($dataBand) || !empty($dataUser)) {
            return redirect()->back()->withInput()->with('error', 'Username นี้ถูกใช้ไปในระบบแล้ว'); 
        }

        
        if ($inputs['password'] != $inputs['confirmed']) {
            return redirect()->back()->withInput()->with('error', 'รหัสผ่านไม่ตรงกัน'); 
        }

        $inputs['password'] = Hash::make($req->password);
        $inputs['created_at'] = Carbon::now();

        if ($req->type_personal_id == 1) {

            $inputs['band_name'] = $req->name;
            $band->create($inputs);
        }else {
            
            $user->create($inputs);
        }

        return redirect()->route('login');
    }

    public function postLogin(Request $req, User $user, Band $band) {

        $typePersonal = $req->type_personal_id;
        $username = $req->username;
        $password = $req->password;

        $dataBand = $band->where('username', $username)->first();
        $dataUser = $user->where('username', $username)->first();
        
        if (empty($dataBand) && empty($dataUser)) {
            return redirect()->back()->with('error', 'ไม่สามารถเข้าสู่ระบบได้ เนื่องจากข้อมูลผิดพลาด'); 
        }

        if (!empty($dataBand)) {
            if (!Hash::check($password, $dataBand->password)) {
                return redirect()->back()->withInput()->with('error', 'ไม่สามารถเข้าสู่ระบบได้ เนื่องจากรหัสผ่านไม่ถูกต้อง'); 
            }

            Auth::guard('band')->attempt(['username' => $req->username, 'password' => $req->password]);

            session([
                'data' => $dataBand
            ]);

            return redirect()->route('home');
        }else if(!empty($dataUser)) {
            if (!Hash::check($password, $dataUser->password)) {
                return redirect()->back()->withInput()->with('error', 'ไม่สามารถเข้าสู่ระบบได้ เนื่องจากรหัสผ่านไม่ถูกต้อง'); 
            }

            Auth::guard('user')->attempt(['username' => $req->username, 'password' => $req->password]);

            session([
                'data' => $dataUser
            ]);

            return redirect('/');
        }
    }

    public function getLogout() {
        
        Session::flush();
        return redirect()->route('login');
    }
}
