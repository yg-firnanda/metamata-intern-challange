<nav class="fixed bg-primary">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="{{ route('recipes') }}" class="text-decoration-none text-black">
                    <h1>Resepku</h1>
                </a>
            </div>
            @auth
                <div class="d-flex gap-3">
                    <a href="{{ route('user.index') }}" class="btn btn-light">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-light">Logout</button>
                    </form>
                </div>
            @else
                <div>
                    <a href="{{ route('login.index') }}">
                        <button class="btn btn-light">Login</button>
                    </a>
                    <a href="{{ route('register.index') }}">
                        <button class="btn btn-light">Register</button>
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>