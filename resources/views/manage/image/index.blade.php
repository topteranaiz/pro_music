@extends('template.master')
@section('content')
<section class="dashboard section">
	<div class="container">
		<div class="row">
			@include('template.partials.manage.sidebar')
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<div class="widget dashboard-container my-adslist">
					<h3 class="widget-header">
						<a class="nav-link text-white add-button" href="{{ route('music.image.create') }}"><i class="fa fa-plus-circle"></i> เพิ่มรูปภาพ</a>
					</h3>

					<table class="table table-responsive product-dashboard-table">
						<thead>
							<tr>
								<th class="text-center">รูปภาพ</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($dataImage as $item)
								<tr>
									{{-- <td class="product-category">
										<span class="categories">{{ $item->path }}</span>
									</td> --}}
									<td class="product-thumb">
										<img width="100%" height="auto" src="{{ asset($item->path) }}" alt="image description">
									</td>
									<td class="action" data-title="Action">
										<div class="">
											<ul class="list-inline justify-content-center">
												<li class="list-inline-item">
													<a data-toggle="tooltip" data-placement="top" title="Edit" class="edit" href="{{ route('music.image.edit',[$item->id]) }}">
														<i class="fa fa-pencil"></i>
													</a>
												</li>
												<li class="list-inline-item">
													<a data-toggle="tooltip" data-placement="top" title="Delete" class="delete" href="{{ route('music.image.delete',$item->id) }}">
														<i class="fa fa-trash"></i>
													</a>
												</li>
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
