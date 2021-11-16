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

        if ($typePersonal == 1) {
            $data = $band->where('username', $username)->first();

            if (!empty($data)) {
                if (!Hash::check($password, $data->password)) {
                    return Redirect::back()
                        ->with('warning')
                        ->withInput();
                }

                Auth::guard('band')->attempt(['username' => $req->username, 'password' => $req->password]);

                session([
                    'data' => $data
                ]);

                return redirect()->route('home');

            } else {
                return Redirect::back()
                    ->with('warning')
                    ->withInput();
            }
            
        }else {
            $data = $user->where('username', $username)->first();

            if (!empty($data)) {
                if (!Hash::check($password, $data->password)) {
                    return Redirect::back()
                        ->with('warning')
                        ->withInput();
                }

                Auth::guard('user')->attempt(['username' => $req->username, 'password' => $req->password]);

                session([
                    'data' => $data
                ]);

                return redirect('/');

            } else {
                return Redirect::back()
                    ->with('warning')
                    ->withInput();
            }

        }

    }

    public function getLogout() {
        
        Session::flush();
        return redirect()->route('login');
    }
}
