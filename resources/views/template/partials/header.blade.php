<section class="">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li @if(request()->is('/')) class="nav-item active" @else class="nav-item" @endif>
								<a class="nav-link" href="/"><i class="fa fa-music"></i><b>&nbsp;Home</b></a>
							</li>

							@if(!empty(Auth::guard('band')->user()))
							{{-- {{ dd(request()->is('/music')) }} --}}
							{{-- @if(request()->is('website') || request()->is('website/search/*')) class="nav-item active" @endif --}}
								{{-- <li @if(request()->is('/')) class="nav-item active" @else class="nav-item" @endif>
									<a class="nav-link" href="{{ route('home') }}"><i class="fa fa-info"></i><b>&nbsp;Profile</b></a>
								</li> --}}
								<li @if(request()->is('home')) class="nav-item active" @else class="nav-item" @endif>
									<a class="nav-link" href="{{ route('home') }}"><i class="fa fa-user"></i>&nbsp;ประเภทรับงาน</a>
								</li>
								<li @if(request()->is('music')) class="nav-item active" @else class="nav-item" @endif>
									<a class="nav-link" href="{{ route('music.index') }}"><i class="fa fa-bookmark-o"></i>&nbsp;ผลงาน</a>
								</li>
								<li @if(request()->is('music/image')) class="nav-item active" @else class="nav-item" @endif>
									<a class="nav-link" href="{{ route('music.image.index') }}"><i class="fa fa-file-archive-o"></i>&nbsp;รูปภาพ</a>
								</li>
								<li @if(request()->is('job/admin')) class="nav-item active" @else class="nav-item" @endif>
									<a class="nav-link" href="{{ route('job.index.band') }}"><i class="fa fa-file-archive-o"></i>&nbsp;รายการที่จ้างงาน</a>
								</li>
							@elseif(!empty(Auth::guard('user')->user()))
								{{-- <li @if(request()->is('/')) class="nav-item active" @else class="nav-item" @endif>
									<a class="nav-link" href="{{ route('job.index.user') }}"><i class="fa fa-info"></i><b>&nbsp;Profile</b></a>
								</li> --}}
								<li @if(request()->is('job/user')) class="nav-item active" @else class="nav-item" @endif>
									<a class="nav-link" href="{{ route('job.index.user') }}"><i class="fa fa-user"></i>&nbsp;รายการที่จ้างงาน</a>
								</li>
							@endif

						</ul>
						@if(empty(Session::get('data')))
							<ul class="navbar-nav ml-auto mt-10">
								<li class="nav-item">
									<a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;Login</a>
								</li>
							</ul>
						@else
							<ul class="navbar-nav ml-auto mt-10">
								<li class="nav-item">
									@if(!empty(Auth::guard('band')->user()))
										<p>username: {{ Auth::guard('band')->user()->band_name }}</p>
									@elseif(!empty(Auth::guard('user')->user()))
										<p>username: {{ Auth::guard('user')->user()->name }}</p>
									@endif
									<a onclick="event.preventDefault();
									document.getElementById('logout-form').submit();" href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout</a>
								</li>
							</ul>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>

						@endif
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>