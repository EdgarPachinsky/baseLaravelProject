<section class="container">
    <div class="top-nav">
        <div class="top-nav-content">
            <span class="top-nav-item">
                <a href="/">HOME</a>
            </span>
            <span class="top-nav-logo">
                <i class="cf cf-flo"></i>
            </span>
            <span class="top-nav-item">
                ABOUT
            </span>
            @guest
            <div class="top-nav-user-actions">
                    <span class="top-nav-guest-actions-item">
                        <i class="ti-link"></i>
                        <a href="{{ route("login") }}">Login</a>
                    </span>/
                <span class="top-nav-guest-actions-item">
                        <a href="{{ route("register") }}">Register</a>
                        <i class="ti-user"></i>
                    </span>
            </div>
            @else
                <div class="top-nav-user-actions">
                    <span class="top-nav-guest-actions-item">
                        <i class="ti-crown"></i>
                        {{ \Illuminate\Support\Facades\Auth::user()->name }}
                    </span>/

                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                        <span class="top-nav-guest-actions-item">
                            <a href="/admin">Site Dashboard</a>
                            <i class="ti-unlock"></i>
                        </span>/
                    @endif

                    <span class="top-nav-guest-actions-item">
                        <a href="{{ route("accountEdit") }}">Edit Account</a>
                        <i class="ti-reload"></i>
                    </span>/
                    <span class="top-nav-guest-actions-item">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <i class="ti-unlink"></i>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </span>
                </div>
            @endguest
            <hr class="top-nav-border">
        </div>
    </div>
</section>
