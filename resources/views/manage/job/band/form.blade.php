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
							<h3 class="widget-header user">รายละเอียดที่จ้างงาน</h3>
							<form method="POST" action="{{ route('job.updateStatus.band') }}">
                                @csrf
                                @if(isset($edit))
                                    <input type="hidden" name="job_id" value="{{$edit->id}}">
                                @endif
                                <div class="form-group">
                                    <label for="first-name">ประเภทงานที่รับ</label>
                                    <input type="text" required class="form-control" readonly value="{{ isset($edit) ? $edit->getTypeMusicJoin->getTypeWork->name_work: "" }}">
                                </div>
                                <div class="form-group">
                                    <label for="first-name">ราคา</label>
                                    <input type="text" required class="form-control" readonly value="{{ isset($edit) ? $edit->getTypeMusicJoin->price: "" }}">
                                </div>
                                <div class="form-group">
                                    <label for="first-name">วันที่รับงาน</label>
                                    <input type="text" required class="form-control" readonly value="{{ isset($edit) ? $edit->date: "" }}">
                                </div>
                                <div class="form-group">
                                    <label for="first-name">รายละเอียด</label>
                                    <input type="text" class="form-control" readonly value="{{ isset($edit) ? $edit->detail: "" }}">
                                </div>
                                <div class="form-group">
                                    <label for="first-name">สถานะ</label>
                                    <select name="status" required class="w-100 form-control mt-lg-1 mt-md-2">
                                        <option value="">กรุณาเลือก</option>
                                        @foreach ($status as $item)
                                            <option {{ isset($edit) && $edit->status == $item->status_id ? 'selected' : '' }} value="{{ $item->status_id }}">{{ $item->status_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
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
