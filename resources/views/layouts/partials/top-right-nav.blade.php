@php
$user = auth()->user();
@endphp
<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
        <i class="fas fa-plus"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
        <span class="dropdown-item dropdown-header">Quick Actions</span>
        <div class="dropdown-divider"></div>
        <div class="row row-paddingless" style="padding-left: 15px; padding-right: 15px;">
            <div class="col-6 p-0 border-bottom border-right">
                <a href="{{ route('user.create') }}" class="d-block text-center py-3 bg-hover-light"> <i
                        class="fas fa-users"></i>
                    <span class="w-100 d-block text-muted">Add User</span>
                </a>
            </div>
            <div class="col-6 p-0 border-bottom border-right">
                <a href="{{ route('role.create') }}" class="d-block text-center py-3 bg-hover-light"> <i
                        class="fas fa-lock"></i>
                    <span class="w-100 d-block text-muted">Add Role</span>
                </a>
            </div>
            <div class="col-12 p-0 border-bottom border-right">
                <a href="{{ route('setting', 'website') }}" class="d-block text-center py-3 bg-hover-light"> <i
                        class="fas fa-cog"></i>
                    <span class="w-100 d-block text-muted">Setting</span>
                </a>
            </div>
        </div>
        <div class="dropdown-divider"></div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
    </a>
</li>
<li class="nav-item">
    <a id="mode_change" class="nav-link" href="javascript:void(0)" role="button" style="
    padding-top: 11px;
">
        <svg id="dark" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" stroke-width="2"
            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icon-tabler-brightness-down">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <circle cx="12" cy="12" r="3"></circle>
            <line x1="12" y1="5" x2="12" y2="5.01"></line>
            <line x1="17" y1="7" x2="17" y2="7.01"></line>
            <line x1="19" y1="12" x2="19" y2="12.01"></line>
            <line x1="17" y1="17" x2="17" y2="17.01"></line>
            <line x1="12" y1="19" x2="12" y2="19.01"></line>
            <line x1="7" y1="17" x2="7" y2="17.01"></line>
            <line x1="5" y1="12" x2="5" y2="12.01"></line>
            <line x1="7" y1="7" x2="7" y2="7.01"></line>
        </svg>
        <svg id="light" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" stroke-width="2"
            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icon-tabler-moon">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z">
            </path>
        </svg>
    </a>
</li>
<li class="nav-item dropdown user-menu">
    <a href="{{ route('profile') }}" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        @if ($user->image)
            <img src="{{ asset($user->image) }}" class="user-image img-circle elevation-2" alt="User Image">
        @else
            <img src="{{ asset('backend/image/default.png') }}" class="user-image img-circle elevation-2"
                alt="User Image">
        @endif
        <span class="d-none d-md-inline">{{ $user->name }}</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
        <!-- User image -->
        <li class="user-header bg-primary">
            @if ($user->image)
                <img src="{{ asset($user->image) }}" class="user-image img-circle elevation-2" alt="User Image">
            @else
                <img src="{{ asset('backend/image/default.png') }}" class="user-image img-circle elevation-2"
                    alt="User Image">
            @endif
            <p>
                {{ $user->name }} -
                @foreach ($user->getRoleNames() as $role)
                    ( <span>{{ ucwords($role) }}</span> )
                @endforeach
                <small>Member since {{ $user->created_at->format('M d, Y') }}</small>
            </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <a href="{{ route('profile.setting') }}">Settings</a>
                </div>
            </div>
            <!-- /.row -->
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <a href="{{ route('profile') }}" class="btn btn-default btn-flat">Profile</a>
            <a href="javascript:void(0)"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                class="btn btn-default btn-flat float-right">Sign out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</li>
