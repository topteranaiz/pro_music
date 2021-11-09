@extends('template.master')
@section('content')
<section class="page-search">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="advance-search">
					<form>
						<div class="form-row">
							<div class="form-group col-md-5">
								<input type="text" class="form-control my-2 my-lg-1" id="inputtext4" placeholder="ค้นหาชื่อวงดนตรี">
							</div>
							<div class="form-group col-md-5">
								<select class="w-100 form-control mt-lg-1 mt-md-2">
									<option>กรุณาเลือกประเภทวง</option>
									<option value="1">งานแต่ง</option>
                                    <option value="2">งานบวช</option>
                                    <option value="4">งานทำบุญขึ้นบ้านใหม่</option>
								</select>
							</div>
							<div class="form-group col-md-2">

								<button type="submit" class="btn btn-primary">กดค้นหา</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section bg-gray">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Left sidebar -->
			<div class="col-md-12">
				<div class="product-details">
					<h1 class="product-title">เทพนิรันดร์ศิลป์</h1>
					<div class="product-meta">
						<ul class="list-inline">
							<!-- <li class="list-inline-item"><i class="fa fa-user-o"></i> By <a href="">Andrew</a></li> -->
							<li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a href="">สากล</a></li>
							<li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location<a href="">นครสวรรค์</a></li>
						</ul>
					</div>

					<!-- product slider -->
					<div class="product-slider">
						<div class="product-slider-item my-4" width="200" height="600" data-image="/template/pro_music/themes/classimax-premium/data/thepnirun/timeline_25640906_130120.jpg">
							<img class="w-100" width="200" height="600" src="/template/pro_music/themes/classimax-premium/data/thepnirun/timeline_25640906_130120.jpg" alt="product-img">
						</div>
						<div class="product-slider-item my-4" width="200" height="600" data-image="/template/pro_music/themes/classimax-premium/data/thepnirun/timeline_25640906_130121.jpg">
							<img class="d-block w-100" width="200" height="600" src="/template/pro_music/themes/classimax-premium/data/thepnirun/timeline_25640906_130121.jpg" alt="Second slide">
						</div>
						<div class="product-slider-item my-4" width="200" height="600" data-image="/template/pro_music/themes/classimax-premium/data/thepnirun/timeline_25640906_130122.jpg">
							<img class="d-block w-100" width="200" height="600" src="/template/pro_music/themes/classimax-premium/data/thepnirun/timeline_25640906_130122.jpg" alt="Third slide">
						</div>
						<div class="product-slider-item my-4" width="200" height="600" data-image="/template/pro_music/themes/classimax-premium/data/thepnirun/timeline_25640906_130122_0.jpg">
							<img class="d-block w-100" width="200" height="600" src="/template/pro_music/themes/classimax-premium/data/thepnirun/timeline_25640906_130122_0.jpg" alt="Third slide">
						</div>
						<div class="product-slider-item my-4" width="200" height="600" data-image="/template/pro_music/themes/classimax-premium/data/thepnirun/timeline_25640906_130130.jpg">
							<img class="d-block w-100" width="200" height="600" src="/template/pro_music/themes/classimax-premium/data/thepnirun/timeline_25640906_130130.jpg" alt="Third slide">
						</div>
					</div>
					<!-- product slider -->

					<div class="content mt-5 pt-5">
						<ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
								 aria-selected="true">Product Details</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact"
								 aria-selected="false">Reviews</a>
							</li>
						</ul>
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">รายละเอียดวงดนตรี</h3>
								<p>วงเทพนิรันดร์ศิลป์ก่อตั้งขึ้นมาโดยได้อนุวัต หัวหน้าวง ซึ่งนายอนุวัตถือว่าเป็นนักดนตรีหนุ่มที่เล่นดนตรีอาชีพมาตั้งแต่เด็กๆ เมื่อมีวุติภาวะที่มากขึ้นจึงออกมาตั้งวงเองพร้อมกับชักชวนญาติพี่น้องและให้โอกาสเด็กๆมารวมวง และถือว่าเป็นวงดนตรีวัยรุ่นที่มีความสามารถวงนึง</p>
							</div>
							<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
								<h3 class="tab-title">คอมเม้นวงดนตรี</h3>
								<div class="product-review">
									<div class="media">
										<img src="/template/pro_music/themes/classimax-premium/images/user/user-thumb.jpg" alt="avater">
										<div class="media-body">
											<div class="name">
												<h5>Jessica Brown</h5>
											</div>
											<div class="date">
												<p>Mar 20, 2018</p>
											</div>
											<div class="review-comment">
												<p>
													Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremqe laudant tota rem ape
													riamipsa eaque.
												</p>
											</div>
										</div>
									</div>
									<div class="review-submission">
										<h3 class="tab-title">Submit your review</h3>
										<div class="review-submit">
											<form action="#" class="row">
												<div class="col-lg-6">
													<input type="text" name="name" id="name" class="form-control" placeholder="Name">
												</div>
												<div class="col-lg-6">
													<input type="email" name="email" id="email" class="form-control" placeholder="Email">
												</div>
												<div class="col-12">
													<textarea name="review" id="review" rows="10" class="form-control" placeholder="Message"></textarea>
												</div>
												<div class="col-12">
													<button type="submit" class="btn btn-main">Sumbit</button>
												</div>
											</form>
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
	<!-- Container End -->
</section>
@endsection
