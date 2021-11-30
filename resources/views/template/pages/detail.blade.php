@extends('template.master')
@section('content')
{{-- <section class="section bg-gray"> --}}
	{{-- {{ dd(Auth::guard('user')->user()->getJob) }} --}}
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product-details">
					@if (\Session::has('error'))
						<div class="alert alert-danger">
							<ul>
								<li>{!! \Session::get('error') !!}</li>
							</ul>
						</div>
					@endif
					@if (\Session::has('success'))
						<div class="alert alert-success">
							<ul>
								<li>{!! \Session::get('success') !!}</li>
							</ul>
						</div>
					@endif
					<h1 class="product-title">{{ $detail->band_name }}</h1>
					<div class="product-meta">
						<ul class="list-inline">
							{{-- <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a href="">สากล</a></li> --}}
							<li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location: {{ $detail->address }}</li>
							@if(!empty(Auth::guard('user')->user()) && count(Auth::guard('user')->user()->getJob) > 0)
								@if(Auth::guard('user')->user()->getJob[0]->band_id == $detail->band_id)
									<li class="list-inline-item"><i class="fa fa-location-arrow"></i> เบอร์โทรศัพท์: {{ $detail->tel }}</li>
								@endif
							@endif
						</ul>
					</div>

					@if(count($detail->getMusicAttachment) > 0)
						<div class="product-slider">
							@foreach ($detail->getMusicAttachment as $key => $item)
								@if($key == 0)
									<div class="product-slider-item my-4" width="50%" height="300" data-image="{{ asset($item->path) }}">
										<img class="w-100" width="50%" height="300" src="{{ asset($item->path) }}" alt="product-img">
									</div>
								@else
									<div class="product-slider-item my-4" width="100" height="300" data-image="{{ asset($item->path) }}">
										<img class="d-block w-100" width="100" height="300" src="{{ asset($item->path) }}" alt="Second slide">
									</div>
								@endif
							@endforeach
						</div>
					@endif

					{{-- <div class="content"> --}}
					<div>
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
							@if(!empty(Auth::guard('user')->user()))
								<li class="nav-item">
									<a class="nav-link" id="pills-comment-tab" data-toggle="pill" href="#pills-comment" role="tab" aria-controls="pills-comment"
									aria-selected="false">จ้างวงดนตรี</a>
								</li>
							@endif
							<li class="nav-item">
								<a class="nav-link" id="pills-preview-tab" data-toggle="pill" href="#pills-preview" role="tab" aria-controls="pills-preview"
								aria-selected="false">ความคิดเห็น</a>
							</li>
						</ul>
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">รายละเอียดวงดนตรี</h3>
								<p style="font-size:18px;">{{ $detail->detail }}</p>
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
												<div class="col-sm">
													รายละเอียด
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
													<div class="col-sm">
														{{ !empty($item->detail) ? $item->detail: '-' }}
													</div>
												</div>
											@endforeach
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="pills-comment" role="tabpanel" aria-labelledby="pills-comment-tab">
								<div class="product-review">
									<div class="review-submission">
										<h3 class="tab-title">Submit your review</h3>
										<div class="review-submit">
											<form action="{{ route('website.contract') }}" method="POST" class="row">
												@csrf
												
												<input type="hidden" name="band_id" value="{{ $detail->band_id }}">
												@if(!empty(Auth::guard('user')->user()))
													<input type="hidden" name="user_id" value="{{ Auth::guard('user')->user()->user_id }}">
												@endif
												<div class="col-lg-6">
													<p>ประเภทงานที่รับ</p>
													<select class="w-100 form-control mt-lg-1 mt-md-2" required name="type_music_join_id">
														<option value="">กรุณาเลือก</option>
														@foreach ($detail->getTypeMusicJoin as $item)
															<option value="{{ $item->id }}">{{ $item->getTypeWork->name_work }}</option>
														@endforeach
													</select>
												</div>
												<div class="col-lg-6">
													<p>วันที่จ้างงาน</p>
													<input type="date" name="date" required class="form-control">
												</div>
												<div class="col-12">
													<textarea name="detail" id="review" rows="8" class="form-control" placeholder="Message"></textarea>
												</div>
												<div class="col-12">
													<button type="submit" class="btn btn-main">Sumbit</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="pills-preview" role="tabpanel" aria-labelledby="pills-preview-tab">
								<h3 class="tab-title">คอมเม้นวงดนตรี</h3>
								<div class="product-review">
									@foreach ($detail->getComment as $item)
									{{-- {{ dd($item->getUser->name) }} --}}
										<div class="media">
											@if(!empty($item->image))
												<img src="{{ asset($item->image) }}" alt="avater">
											@else
												<img src="{{ asset('/image/profile/default.png') }}" alt="avater">
											@endif
											<div class="media-body">
												<div class="name">
													<h5>{{ $item->getUser->name }}</h5>
												</div>
												<div class="date">
													<p>{{ $item->created_at }}</p>
												</div>
												<div class="review-comment">
													<p>{{ $item->comment }}</p>
												</div>
											</div>
										</div>
									@endforeach
									@if(!empty(Auth::guard('user')->user()) && count(Auth::guard('user')->user()->getJob) > 0)
										@if(Auth::guard('user')->user()->getJob[0]->band_id == $detail->band_id)
											<div class="review-submission">
												<div class="review-submit">
													<form action="{{ route('website.comment') }}" method="POST" class="row">
														@csrf
														<input type="hidden" name="band_id" value="{{ $detail->band_id }}">
														@if(!empty(Auth::guard('user')->user()))
															<input type="hidden" name="user_id" value="{{ Auth::guard('user')->user()->user_id }}">
														@endif
														<div class="col-12">
															<textarea name="comment" id="review" rows="8" class="form-control" placeholder="Message"></textarea>
														</div>
														<div class="col-12">
															<button type="submit" class="btn btn-main">Sumbit</button>
														</div>
													</form>
												</div>
											</div>
										@endif
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
{{-- </section> --}}
@endsection
