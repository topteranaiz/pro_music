@extends('template.master')
@section('content')
<section class="section bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product-details">
					<h1 class="product-title">{{ $detail->band_name }}</h1>
					<div class="product-meta">
						<ul class="list-inline">
							{{-- <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a href="">สากล</a></li> --}}
							<li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location {{ $detail->address }}</li>
						</ul>
					</div>

					@if(count($detail->getMusicAttachment) > 0)
						<div class="product-slider">
							@foreach ($detail->getMusicAttachment as $key => $item)
								@if($key == 0)
									<div class="product-slider-item my-4" width="200" height="600" data-image="{{ asset($item->path) }}">
										<img class="w-100" width="200" height="600" src="{{ asset($item->path) }}" alt="product-img">
									</div>
								@else
									<div class="product-slider-item my-4" width="200" height="600" data-image="{{ asset($item->path) }}">
										<img class="d-block w-100" width="200" height="600" src="{{ asset($item->path) }}" alt="Second slide">
									</div>
								@endif
							@endforeach
						</div>
					@endif

					<div class="content mt-5 pt-5">
						<ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
								 aria-selected="true">รายละเอียดวงดนตรี</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact"
								 aria-selected="false">ผลงาน</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-typemusic-tab" data-toggle="pill" href="#pills-typemusic" role="tab" aria-controls="pills-typemusic"
								 aria-selected="false">รายละเอียดการรับงาน</a>
							</li>
						</ul>
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">รายละเอียดวงดนตรี</h3>
								<p>{{ $detail->detail }}</p>
							</div>
							<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
								@foreach ($detail->getMusic as $item)
									<h3 class="tab-title">รายละเอียดผลงาน {{ $item->name }}</h3>
									<div class="product-review">
										<div class="media">
											<div class="container">
												<div class="row">
													@foreach ($item->getMusicEmbed as $dataEmbed)
														<div class="col-sm">
															<iframe src="{{ $dataEmbed->link }}" height="200" width="300" title="Iframe Example"></iframe>
														</div>
													@endforeach
												</div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
							<div class="tab-pane fade" id="pills-typemusic" role="tabpanel" aria-labelledby="pills-typemusic-tab">
								<h3 class="tab-title">รายละเอียดการรับงาน</h3>
								<div class="product-review">
									<div class="media">
										<div class="container">
											<div class="row">
												<div class="col-sm">
													ประเภทงานที่รับ
												</div>
												<div class="col-sm">
													ราคา
												</div>
											</div>
											<hr>
											@foreach ($detail->getTypeMusicJoin as $item)
												<div class="row">
													<div class="col-sm">
														{{ $item->getTypeWork->name_work }}
													</div>
													<div class="col-sm">
														{{ $item->price }}
													</div>
												</div>
											@endforeach
											
											{{-- <div class="row">
												<div class="col-sm">
													งานแต่ง
												</div>
												<div class="col-sm">
													2,000
												</div>
											</div> --}}
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
