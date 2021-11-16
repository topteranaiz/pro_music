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
							<h3 class="widget-header user">เพิ่มรูปภาพ</h3>
							<form method="POST" action="{{ isset($edit) ? route('music.image.update'): route('music.image.store') }}" enctype="multipart/form-data">
                                @csrf
                                @if(isset($edit))
                                    <input type="hidden" name="id" value="{{$edit->id}}">
                                @endif
                                <div id="dynamicfile">
									<div class="form-group">
										<label for="first-name">รูปภาพ</label>
										<input type="file" class="form-control" multiple name="image" value="">
									</div>
								</div>
                                @if(isset($edit) && !empty($edit->path))
                                    <div class="form-group">
                                        <label for="first-name">รูปภาพปัจจุบัน</label>
                                        <img src="{{ asset($edit->path) }}" alt="" width="100%">
                                    </div>
								@endif
                                <div class="row">
                                    {{-- <div class="col-lg-3">
                                        <a href="/music/image" type="button" class="btn btn-danger d-block mt-2">Cancel</a>
                                    </div> --}}
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
            console.log('testtt')
            i++;
            var fields =
                '<div id="row'+i+'" class="form-group">'+
                    '<label for="first-name">Youtube Embed</label>'+
                        '<a type="button" id="'+i+'" class="badge badge-danger badge-pill removeEmbed">-</a>'+
                        '<input type="text" class="form-control" multiple name="embed[]" value="">'+
                '</div>';

            $('#dynamicfile').append(fields);
            $(document).on('click', '.removeEmbed', function() {

                var button_id = $(this).attr("id");
                console.log(button_id);

                $('#row'+button_id+'').remove();
            });
        });
    });

</script>
@endsection
