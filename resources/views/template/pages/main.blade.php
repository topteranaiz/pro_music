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
										<div class="form-group col-md-4">
											<input type="text" class="form-control my-2 my-lg-1" name="name" value="{{ request()->input('name') ? request()->input('name') : null }}" placeholder="ค้นหาชื่อวงดนตรี">
										</div>
										<div class="form-group col-md-4">
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
										<div class="form-group col-md-4">
											<select class="w-100 form-control mt-lg-1 mt-md-2" name="type_work_id">
												<option value="">กรุณาเลือก</option>
												@foreach ($dataTypeWork as $item)
													<option {{ request()->input('type_work_id') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name_work }}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group col-md-4">
											<input type="date" class="form-control my-2 my-lg-1" name="date" value="{{ request()->input('date') ? request()->input('date') : null }}">
										</div>
										<div class="form-group col-md-2">
											<input type="text" class="form-control my-2 my-lg-1" name="priceStart" value="{{ request()->input('priceStart') ? request()->input('priceStart') : null }}" placeholder="ค้นหาช่วงราคา">
										</div>
										<div class="form-group col-md-2">
											<input type="text" class="form-control my-2 my-lg-1" name="priceEnd" value="{{ request()->input('priceEnd') ? request()->input('priceEnd') : null }}" placeholder="ถึงราคา">
										</div>
										<div class="form-group col-md-2">
											<button type="submit" class="btn btn-primary">กดค้นหา</button>
										</div>
										<div class="form-group col-md-2">
											<a href="/"><button type="button" class="btn btn-danger">ล้างคำค้นหา</button></a>
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
								<a href="{{ route('website.detail', $item->band_id) }}">
									@if(!empty($item->profile))
										<img class="card-img-top" src="{{ asset($item->profile) }}" width="200" height="300" alt="Card image cap">
									@else
										<img class="card-img-top" src="{{ asset('/image/default_music.jpg') }}" width="200" height="300" alt="Card image cap">
									@endif
								</a>
							</div>
							<div class="card-body">
								<h4 class="card-title"><a href="{{ route('website.detail', $item->band_id) }}">{{ $item->band_name }}</a></h4>
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
