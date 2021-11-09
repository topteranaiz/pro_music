<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
    <div class="sidebar">
        <div class="widget user-dashboard-profile">
            <div class="profile-thumb">
                @if(!empty(Auth::guard('web')->user()->image))
                    <img src="{{ asset(Auth::guard('web')->user()->image) }}" alt="" class="rounded-circle">
                @else
                    <img src="{{ asset('/image/profile/default.png') }}" alt="" class="rounded-circle">
                @endif
            </div>
            <h5 class="text-center">{{ Auth::guard('web')->user()->name }}</h5>
                <p>{{ Auth::guard('web')->user()->created_at }}</p>
            {{-- @if(Request::segment(1) == "home") --}}
                <a href="{{ route('profile.edit', [Auth::guard('web')->user()->id]) }}" class="btn btn-main-sm">Edit Profile</a>
            {{-- @endif --}}
        </div>
        <div class="widget user-dashboard-menu">
            <ul>
                <li><a href="{{ route('home') }}"><i class="fa fa-user"></i>ประเภทรับงาน</a></li>
                <li>
                    <a href="{{ route('music.index') }}"><i class="fa fa-bookmark-o"></i>ผลงาน</a>
                </li>
                <li>
                    <a href="{{ route('music.image.index') }}"><i class="fa fa-file-archive-o"></i>รูปภาพ</a>
                </li>
                {{-- <li>
                    <a href="dashboard-archived-ads.html"><i class="fa fa-file-archive-o"></i>Archeved Ads</a>
                </li>
                <li>
                    <a href="dashboard-pending-ads.html"><i class="fa fa-bolt"></i> Pending Approval</a>
                </li> --}}
                {{-- <li>
                    <a href=""><i class="fa fa-cog"></i> Logout</a>
                    <a onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" href="{{ route('logout') }}"><i class="fa fa-cog"></i>Logout</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form> --}}
                {{-- <li>
                    <a href="" data-toggle="modal" data-target="#deleteaccount"><i class="fa fa-power-off"></i>Delete Account</a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>