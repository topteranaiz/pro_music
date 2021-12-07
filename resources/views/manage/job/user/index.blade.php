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
								<th class="text-center">วงที่จ้างงาน</th>
								<th class="text-center">ประเภทงานที่รับ</th>
								<th class="text-center">ราคา</th>
								<th class="text-center">วันที่</th>
								<th class="text-center">รายละเอียด</th>
								<th class="text-center">สถานะ</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($jobs as $item)
								<tr>
									<td class="product-category">
										<span class="categories">{{ !empty($item->getBand->band_name) ? $item->getBand->band_name: '-' }}</span>
									</td>
									<td class="product-category">
										<span class="categories">{{ !empty($item->getTypeMusicJoin) ? $item->getTypeMusicJoin->getTypeWork->name_work: '-' }}</span>
									</td>
                                    <td class="product-category">
										<span class="categories">{{ !empty($item->getTypeMusicJoin) ? $item->getTypeMusicJoin->price: '-' }}</span>
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
									<td class="action" data-title="Action">
										@if($item->status != 2)
											<div class="">
												<ul class="list-inline justify-content-center">
													{{-- <li class="list-inline-item">
														<a data-toggle="tooltip" data-placement="top" title="Edit" class="edit" href="{{ route('typemusic.edit',[$item->id]) }}">
															<i class="fa fa-pencil"></i>
														</a>
													</li> --}}
													{{-- <li class="list-inline-item">
														<a data-toggle="tooltip" data-placement="top" title="Delete" class="delete" href="{{ route('job.deleteJobUser',$item->id) }}">
															<i class="fa fa-trash"></i>
														</a>
													</li> --}}
													<li class="list-inline-item">
														<a data-toggle="tooltip" data-placement="top" title="Delete" class="delete" onclick="alertConfirm({{ $item->id }})">
															<i class="fa fa-trash"></i>
														</a>
													</li>
												</ul>
											</div>
										@endif
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('js')
    <script>
        function alertConfirm(id) {
            Swal.fire({
            title: 'ยืนยันการลบช้อมูล?',
            // text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{URL::to('job/delete')}}"+'/'+id
                }
            })
        }
    </script>
@endsection
