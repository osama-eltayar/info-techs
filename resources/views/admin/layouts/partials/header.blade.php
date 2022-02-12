<header>
    <nav>
        <div class="logo-nav">
            <a href="/dashboard" class="collapse-btn"><i class="fal fa-bars"></i></a>
            <img src="/admin/assets/img/fav.png" alt="image">
        </div>
        <div class="navbar">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->name}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Settngs</a></li>
                    <li><a class="dropdown-item" href="{{route('admin.logout')}}" onclick="$('#logout-form').submit()">Logout</a></li>
                </ul>
                <form action="{{route('admin.logout')}}" method="POST" id="logout-form">
                    @csrf
                </form>
            </div>
        </div>
    </nav>
</header>
