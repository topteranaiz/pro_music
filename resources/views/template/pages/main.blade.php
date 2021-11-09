@extends('template.master')
@section('content')
<section class="hero-area bg-1 text-center overly">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content-block">
					<h1>วงดนตรี</h1>
					<p>Join the millions who buy and sell from each other <br> everyday in local communities around the world</p>
				</div>
				<div class="advance-search bg-gray">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12 col-md-12 align-content-center">
								<form>
									<div class="form-row">
										<div class="form-group col-md-3">
											<input type="text" class="form-control my-2 my-lg-1" id="inputtext4" name="name" value="{{ request()->input('name') ? request()->input('name') : null }}" placeholder="ค้นหาชื่อวงดนตรี">
										</div>
										<div class="form-group col-md-3">
											<select class="w-100 form-control mt-lg-1 mt-md-2" name="area_id">
												<option value="">ภูมิภาค</option>
												<option {{ request()->input('area_id') == "1" ? 'selected' : '' }} value="1">ภาคเหนือ</option>
												<option {{ request()->input('area_id') == "2" ? 'selected' : '' }} value="2">ภาคอีสาน</option>
												<option {{ request()->input('area_id') == "3" ? 'selected' : '' }} value="3">ภาคตะวันตก</option>
												<option {{ request()->input('area_id') == "4" ? 'selected' : '' }} value="4">ภาคกลาง</option>
												<option {{ request()->input('area_id') == "5" ? 'selected' : '' }} value="5">ภาคตะวันออก</option>
												<option {{ request()->input('area_id') == "6" ? 'selected' : '' }} value="6">ภาคใต้</option>
											</select>
										</div>
										<div class="form-group col-md-3">
											<select class="w-100 form-control mt-lg-1 mt-md-2" name="type_car_audio">
												<option value="">ประเภทรถแห่</option>
												<option {{ request()->input('type_car_audio') == "1" ? 'selected' : '' }} value="1">รถแห่ 6 ล้อขนาดใหญ่ พร้อมให้ความบันเทิงอย่างเต็มรูปแบบแสงสีเสียงขั้นอลังการ</option>
												<option {{ request()->input('type_car_audio') == "2" ? 'selected' : '' }} value="2">รถแห่เล็ก สนุกได้แบบกระทัดรัด สนุกได้ทุกพื้นที่</option>
												<option {{ request()->input('type_car_audio') == "3" ? 'selected' : '' }} value="3">ทีมงานน้อยแต่มีคุณภาพพร้อมเสิร์ฟความบันเทิงอย่างสุดเหวี่ยง</option>
											</select>
										</div>
										<div class="form-group col-md-3 align-self-center">
											<button type="submit" class="btn btn-primary">กดค้นหา</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="popular-deals section bg-gray">
	<div class="container">
		<div class="row">
			@foreach ($dataMusics as $item)
				<div class="col-sm-4 col-lg-4">
					<div class="product-item bg-light">
						<div class="card">
							<div class="thumb-content">
								<a href="{{ route('website.detail', $item->id) }}">
									@if(!empty($item->image))
										<img class="card-img-top" src="{{ asset($item->image) }}" width="200" height="300" alt="Card image cap">
									@else
										<img class="card-img-top" src="{{ asset('/image/default_music.jpg') }}" width="200" height="300" alt="Card image cap">
									@endif
								</a>
							</div>
							<div class="card-body">
								<h4 class="card-title"><a href="{{ route('website.detail', $item->id) }}">{{ $item->name }}</a></h4>
								@if(!empty($item->detail))
									<p class="card-text">{{ $item->detail }}</p>
								@else
									<p class="card-text">ตัวอย่างรายละเอียด</p>
								@endif
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>
@endsection
