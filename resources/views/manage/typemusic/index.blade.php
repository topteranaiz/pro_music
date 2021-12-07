@extends('template.master')
@section('content')
<section class="dashboard section">
	<div class="container">
		<div class="row">
			@include('template.partials.manage.sidebar')
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<div class="widget dashboard-container my-adslist">
					<h3 class="widget-header">
						<a class="nav-link text-white add-button" href="{{ route('typemusic.create') }}"><i class="fa fa-plus-circle"></i> เพิ่มประเภทงานที่รับ</a>
					</h3>

					<table class="table table-responsive product-dashboard-table">
						<thead>
							<tr>
								<th class="text-center">ประเภทงานที่รับ</th>
								<th class="text-center">ราคา</th>
								<th class="text-center">รายละเอียด</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($dataTypeMusics as $item)
								<tr>
									<td class="product-category">
										<span class="categories">{{ $item->getTypeWork->name_work }}</span>
									</td>
									<td class="product-category">
										<span class="categories">{{ $item->price }}</span>
									</td>
									<td class="product-category">
										<span class="categories">{{ !empty($item->detail) ? $item->detail: '-' }}</span>
									</td>
									<td class="action" data-title="Action">
										<div class="">
											<ul class="list-inline justify-content-center">
												<li class="list-inline-item">
													<a data-toggle="tooltip" data-placement="top" title="Edit" class="edit" href="{{ route('typemusic.edit',[$item->id]) }}">
														<i class="fa fa-pencil"></i>
													</a>
												</li>
												@if(count($item->getJob) <= 0)
												{{-- <li class="list-inline-item">
													<a data-toggle="tooltip" data-placement="top" title="Delete" class="delete" href="{{ route('typemusic.delete',$item->id) }}">
														<i class="fa fa-trash"></i>
													</a>
												</li> --}}
												<li class="list-inline-item">
													<a data-toggle="tooltip" data-placement="top" title="Delete" class="delete" onclick="alertConfirm({{ $item->id }})">
														<i class="fa fa-trash"></i>
													</a>
												</li>
												@endif
											</ul>
										</div>
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
                    window.location.href = "{{URL::to('type-music/delete')}}"+'/'+id
                }
            })
        }
    </script>
@endsection
