<section class="bg-header">
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
							<li class="nav-item">
								<a class="nav-link" href="/"><i class="fa fa-music"></i><b>&nbsp;Home</b></a>
							</li>

							@if(!empty(Auth::guard('band')->user()))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('home') }}"><i class="fa fa-info"></i><b>&nbsp;Profile</b></a>
								</li>
							@elseif(!empty(Auth::guard('user')->user()))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('job.index.user') }}"><i class="fa fa-info"></i><b>&nbsp;Profile</b></a>
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