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
							<form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
								@csrf
								@if(isset($edit))
                                    <input type="hidden" name="id" value="{{$edit->id}}">
                                @endif
								<div class="form-group">
									<label for="first-name">ชื่อวงดนตรี</label>
									<input type="text" value="{{ isset($edit) ? $edit->name: "" }}" name="name" class="form-control">
								</div>
								<div class="form-group">
									<label for="last-name">Email</label>
									<input type="text" value="{{ isset($edit) ? $edit->email: "" }}" name="email" class="form-control">
								</div>

								<div class="form-group">
									<label for="last-name">Password</label>
									<input type="password" class="form-control" name="password">
								</div>

								<div class="form-group">
									<label for="first-name">ภูมิภาค</label>
									<select name="area_id" class="w-100">
                                        <option value="">กรุณาเลือก</option>
                                        <option {{ isset($edit) && $edit->area_id == "1" ? 'selected' : '' }} value="1">ภาคเหนือ</option>
                                        <option {{ isset($edit) && $edit->area_id == "2" ? 'selected' : '' }} value="2">ภาคอีสาน</option>
                                        <option {{ isset($edit) && $edit->area_id == "3" ? 'selected' : '' }} value="3">ภาคตะวันตก</option>
                                        <option {{ isset($edit) && $edit->area_id == "4" ? 'selected' : '' }} value="4">ภาคกลาง</option>
                                        <option {{ isset($edit) && $edit->area_id == "5" ? 'selected' : '' }} value="5">ภาคตะวันออก</option>
                                        <option {{ isset($edit) && $edit->area_id == "6" ? 'selected' : '' }} value="6">ภาคใต้</option>
                                    </select>
								</div>

								<div class="form-group">
									<label for="first-name">ที่อยู่</label>
									<input type="text" value="{{ isset($edit) ? $edit->address: "" }}" name="address" class="form-control">
								</div>

								<div class="form-group">
									<label for="first-name">รายละเอียด</label>
									<input type="text" value="{{ isset($edit) ? $edit->detail: "" }}" name="detail" class="form-control">
								</div>

								<div class="form-group">
									<label for="first-name">รูปภาพรถแห่</label>
									<input type="file" value="" name="image_car_audio" class="form-control">
								</div>
								@if(isset($edit) && !empty($edit->image_car_audio))
									<div class="form-group">
										<label for="first-name">รูปภาพรถแห่</label>
										<img src="{{ asset($edit->image_car_audio) }}" alt="" width="100%">
									</div>
								@endif

								<div class="form-group">
									<label for="first-name">ข้อมูลรถแห่</label>
									<select name="type_car_audio" class="w-100">
                                        <option value="">กรุณาเลือก</option>
                                        <option {{ isset($edit) && $edit->type_car_audio == "1" ? 'selected' : '' }} value="1">รถแห่ 6 ล้อขนาดใหญ่ พร้อมให้ความบันเทิงอย่างเต็มรูปแบบแสงสีเสียงขั้นอลังการ</option>
                                        <option {{ isset($edit) && $edit->type_car_audio == "2" ? 'selected' : '' }} value="2">รถแห่เล็ก สนุกได้แบบกระทัดรัด สนุกได้ทุกพื้นที่</option>
                                        <option {{ isset($edit) && $edit->type_car_audio == "3" ? 'selected' : '' }} value="3">ทีมงานน้อยแต่มีคุณภาพพร้อมเสิร์ฟความบันเทิงอย่างสุดเหวี่ยง</option>
                                    </select>
								</div>

								<div class="form-group">
									<label for="first-name">จำนวนคนในวง</label>
									<input type="text" value="{{ isset($edit) ? $edit->amount_people: "" }}" name="amount_people" class="form-control">
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
                                        <a href="/home" type="button" class="btn btn-danger d-block mt-2">Cancel</a>
                                    </div>
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
