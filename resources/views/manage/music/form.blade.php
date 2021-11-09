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
							<h3 class="widget-header user">เพิ่มผลงาน</h3>
							<form method="POST" action="{{ isset($edit) ? route('music.update'): route('music.store') }}" enctype="multipart/form-data">
                                @csrf
                                @if(isset($edit))
                                    <input type="hidden" name="id" value="{{$edit->id}}">
                                @endif
								<div class="form-group">
									<label for="first-name">ชื่อผลงาน</label>
									<input type="text" class="form-control" name="name" value="{{ isset($edit) ? $edit->name: "" }}">
								</div>
                                {{-- <div id="dynamicfile">
									<div class="form-group">
										<label for="first-name">รูปภาพ</label>
										<input type="file" class="form-control" multiple name="image[]" value="">
									</div>
								</div> --}}
                                <div id="dynamicEmbed">
									<div class="form-group">
										<label for="first-name">Youtube Embed</label>
                                        <a type="button" id="add_embed" class="badge badge-success badge-pill">+</a>
										<input type="text" class="form-control" multiple name="embed[]" value="">
									</div>
								</div>
                                {{-- @if(isset($edit) && count($edit->getMusicAttachment) > 0)
									@foreach ($edit->getMusicAttachment as $key => $item)
										<div class="form-group">
											<label for="first-name">รูปภาพ{{$key+1}}</label>
											<img src="{{ asset($item->path) }}" alt="" width="100%">
											<div class="">
												<a href="{{ route('music.deleteImage',[$item->id]) }}" type="button" class="btn btn-danger d-block mt-2">ลบรูปภาพ</a>
											</div>
										</div>
									@endforeach
								@endif
                                <hr> --}}
                                @if(isset($edit) && count($edit->getMusicEmbed) > 0)
									@foreach ($edit->getMusicEmbed as $key => $item)
                                    {{-- {{ dd($item->embed) }} --}}
										<div class="form-group">
											<label for="first-name">Embed{{$key+1}}</label>
											{{-- <img src="{{ asset($item->path) }}" alt="" width="100%"> --}}
                                            {{-- <embed value="<iframe width="560" height="315" src="https://www.youtube.com/embed/bGwgWhxtgLA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>"> --}}
                                            <iframe src="{{ $item->embed }}" height="200" width="100%" title="Iframe Example"></iframe>
                                            <div class="">
												<a href="{{ route('music.deleteEmbed',[$item->id]) }}" type="button" class="btn btn-danger d-block mt-2">ลบEmbed</a>
											</div>
										</div>
									@endforeach
								@endif
                                <div class="row">
                                    <div class="col-lg-3">
                                        <a href="/music" type="button" class="btn btn-danger d-block mt-2">Cancel</a>
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
@section('js')
<script>
    $(document).ready(function () {
        var i = 1;
        $('#add_embed').click(function() {
            i++;
            var fields =
                '<div id="row'+i+'" class="form-group">'+
                    '<label for="first-name">Youtube Embed</label>'+
                        '<a type="button" id="'+i+'" class="badge badge-danger badge-pill removeEmbed">-</a>'+
                        '<input type="text" class="form-control" multiple name="embed[]" value="">'+
                '</div>';

            $('#dynamicEmbed').append(fields);
            $(document).on('click', '.removeEmbed', function() {

                var button_id = $(this).attr("id");
                console.log(button_id);

                $('#row'+button_id+'').remove();
            });
        });
    });

</script>
@endsection
