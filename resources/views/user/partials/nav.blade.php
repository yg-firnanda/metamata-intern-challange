<nav class="fixed bg-primary">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="{{ route('recipes') }}" class="text-decoration-none text-black">
                    <h1>Resepku</h1>
                </a>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('user.recipes.create') }}" class="text-light text-decoration-none">Tulis Resep</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-light">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>