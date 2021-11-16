<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
    <div class="sidebar">
        <div class="widget user-dashboard-profile">
            <div class="profile-thumb">
                @if(!empty(Auth::guard('band')->user()))
                    @if(!empty(Auth::guard('band')->user()->profile))
                        <img src="{{ asset(Auth::guard('band')->user()->profile) }}" alt="" class="rounded-circle">
                    @else
                        <img src="{{ asset('/image/profile/default.png') }}" alt="" class="rounded-circle">
                    @endif
                @else
                    @if(!empty(Auth::guard('user')->user()->image))
                        <img src="{{ asset(Auth::guard('user')->user()->image) }}" alt="" class="rounded-circle">
                    @else
                        <img src="{{ asset('/image/profile/default.png') }}" alt="" class="rounded-circle">
                    @endif
                @endif
            </div>
            @if(!empty(Auth::guard('band')->user()))
                <h5 class="text-center">{{ Auth::guard('band')->user()->band_name }}</h5>
                <p>{{ Auth::guard('band')->user()->created_at }}</p>
                <a href="{{ route('profile.edit.band', [Auth::guard('band')->user()->band_id]) }}" class="btn btn-main-sm">Edit Profile</a>
            @elseif(!empty(Auth::guard('user')->user()))
                <h5 class="text-center">{{ Auth::guard('user')->user()->name }}</h5>
                <p>{{ Auth::guard('user')->user()->created_at }}</p>
                <a href="{{ route('profile.edit.user', [Auth::guard('user')->user()->user_id]) }}" class="btn btn-main-sm">Edit Profile</a>
            @endif
        </div>
        <div class="widget user-dashboard-menu">
            @if(!empty(Auth::guard('band')->user()))
                <ul>
                    <li><a href="{{ route('home') }}"><i class="fa fa-user"></i>ประเภทรับงาน</a></li>
                    <li>
                        <a href="{{ route('music.index') }}"><i class="fa fa-bookmark-o"></i>ผลงาน</a>
                    </li>
                    <li>
                        <a href="{{ route('music.image.index') }}"><i class="fa fa-file-archive-o"></i>รูปภาพ</a>
                    </li>
                </ul>
            @else
            <ul>
                <li><a href="#"><i class="fa fa-user"></i>รายการที่จ้างงาน</a></li>
            </ul>
            @endif
        </div>
    </div>
</div>