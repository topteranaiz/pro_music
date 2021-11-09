@extends('template.master')
@section('content')
<section class="user-profile section">
	<div class="container">
		<div class="row">
			@include('template.partials.manage.sidebar')
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<div class="row">
					<div class="col-lg-12 col-md-6">
						<div class="widget personal-info">
							<h3 class="widget-header user">เพิ่มประเภทรับงาน</h3>
							<form method="POST" action="{{ isset($edit) ? route('typemusic.update'): route('typemusic.store') }}">
                                @csrf
                                @if(isset($edit))
                                    <input type="hidden" name="id" value="{{$edit->id}}">
                                @endif
								<div class="form-group">
									<label for="first-name">ประเภทงานที่รับ</label>
									<select name="master_type_product_id">
                                        <option value="">กรุณาเลือก</option>
                                        @foreach ($masterType as $item)
											<option {{ isset($edit) && $edit->master_type_product_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
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
