@extends('template.master')
@section('content')
<section class="dashboard section">
	<div class="container">
		<div class="row">
			@include('template.partials.manage.sidebar')
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<div class="widget dashboard-container my-adslist">
					<h3 class="widget-header">
						รายการที่จ้างงาน
					</h3>

					<table class="table table-responsive product-dashboard-table">
						<thead>
							<tr>
								<th class="text-center">ประเภทงานที่รับ</th>
								<th class="text-center">ราคา</th>
								<th class="text-center">วันที่</th>
								<th class="text-center">รายละเอียด</th>
								<th class="text-center">สถานะ</th>
								{{-- <th class="text-center">Action</th> --}}
							</tr>
						</thead>
						<tbody>
							@foreach ($jobs as $item)
								<tr>
									<td class="product-category">
										<span class="categories">{{ $item->getTypeMusicJoin->getTypeWork->name_work }}</span>
									</td>
                                    <td class="product-category">
										<span class="categories">{{ $item->getTypeMusicJoin->price }}</span>
									</td>
									<td class="product-category">
										<span class="categories">{{ $item->date }}</span>
									</td>
									<td class="product-category">
										<span class="categories">{{ !empty($item->detail) ? $item->detail: '-' }}</span>
									</td>
                                    <td class="product-category">
										<span class="categories">{{ $item->getStatus->status_name }}</span>
									</td>
									{{-- <td class="action" data-title="Action">
										<div class="">
											<ul class="list-inline justify-content-center">
												<li class="list-inline-item">
													<a data-toggle="tooltip" data-placement="top" title="Edit" class="edit" href="{{ route('typemusic.edit',[$item->id]) }}">
														<i class="fa fa-pencil"></i>
													</a>
												</li>
												<li class="list-inline-item">
													<a data-toggle="tooltip" data-placement="top" title="Delete" class="delete" href="{{ route('typemusic.delete',$item->id) }}">
														<i class="fa fa-trash"></i>
													</a>
												</li>
											</ul>
										</div>
									</td> --}}
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				{{-- <div class="pagination justify-content-center">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item active"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>
				</div> --}}
			</div>
		</div>
	</div>
</section>
@endsection
