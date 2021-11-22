<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\Status;



class JobController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = session()->get('data');
            return $next($request);
        });
    }

    public function indexUser(Job $job) {

        $this->data['jobs'] = $job->where('user_id', $this->user->user_id)->get();

        return view('manage.job.user.index', $this->data);
    }

    public function indexBand(Job $job) {

        $this->data['jobs'] = $job->where('band_id', $this->user->band_id)->get();

        return view('manage.job.band.index', $this->data);
    }

    public function editBand($id, Job $job, Status $status) {

        $this->data['edit'] = $job->find($id);
        $this->data['status'] = $status->where('status_id','!=', 1)->get();

        return view('manage.job.band.form', $this->data);
    }

    public function updateStatusBand(Request $req, Job $job) {
        $inputs = $req->only('status');

        $id = $req->job_id;

        $data = $job->find($id);

        $data->update($inputs);

        return redirect('job/admin');
    }
}
