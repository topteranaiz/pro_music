@extends('template.master')
@section('content')
{{-- {{ dd($edit) }} --}}
<section class="user-profile section">
	<div class="container">
		<div class="row">
			@include('template.partials.manage.sidebar')
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<div class="row">
					<div class="col-lg-12 col-md-6">
						<div class="widget personal-info">
							<h3 class="widget-header user">แก้ไขข้อมูลส่วนตัว</h3>
							<form method="post" action="{{ route('profile.update.user') }}" enctype="multipart/form-data">
								@csrf
								@if(isset($edit))
                                    <input type="hidden" name="id" value="{{$edit->user_id}}">
                                @endif
								<div class="form-group">
									<label for="first-name">ชื่อวงดนตรี</label>
									<input type="text" value="{{ isset($edit) ? $edit->name: "" }}" name="name" class="form-control">
								</div>
								<div class="form-group">
									<label for="last-name">Username</label>
									<input type="text" value="{{ isset($edit) ? $edit->username: "" }}" name="username" class="form-control">
								</div>

								<div class="form-group">
									<label for="last-name">Password</label>
									<input type="password" class="form-control" name="password">
								</div>

								<div class="form-group">
									<label for="first-name">ที่อยู่</label>
									<input type="text" value="{{ isset($edit) ? $edit->address: "" }}" name="address" class="form-control">
								</div>

								<div class="form-group">
									<label for="first-name">เบอร์โทรศัพท์</label>
									<input type="text" value="{{ isset($edit) ? $edit->tel: "" }}" name="tel" class="form-control">
								</div>
								<div class="form-group choose-file d-inline-flex">
									<i class="fa fa-user text-center px-3"></i>
									<input type="file" class="form-control-file mt-2 pt-1" name="image" id="input-file">
								 </div>
								<div class="row">
                                    <div class="col-lg-3">
                                        <button type="submit" class="btn btn-primary d-block mt-2">Submit</button>
                                    </div>
                                </div>
							</form>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>
</section>
@endsection
