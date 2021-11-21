<ul class="navbar-nav align-items-center ml-auto ml-md-0">
	<li class="nav-item dropdown">
		<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<div class="media align-items-center">
				<span class="avatar avatar-sm rounded-circle">
					<img alt="Image placeholder" src="{{ url($user->gambar) }}">
				</span>
				<div class="media-body ml-2 d-none d-lg-block">
					<span class="mb-0 text-sm  font-weight-bold">{{ $user->name }}</span>
				</div>
			</div>
		</a>
		<div class="dropdown-menu dropdown-menu-right">
			<div class="dropdown-header noti-title">
				<h6 class="text-overflow m-0">Welcome!</h6>
			</div>
			<a href="{{ route('profile') }}" class="dropdown-item">
				<i class="ni ni-single-02"></i>
				<span>Edit Profile</span>
			</a>
			<div class="dropdown-divider"></div>
			<a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
				<i class="ni ni-user-run"></i>
				<span>Logout</span>
			</a>
		</div>
	</li>
</ul>