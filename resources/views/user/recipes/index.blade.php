@extends('user.layouts.main')

@section('pageTitle')
    Recipes
@endsection

@section('content')
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1>My Recipes</h1>
            <a href="{{ route('user.recipes.create') }}">
                <button class="btn btn-primary">Tambah Resep</button>
            </a>
        </div>
        <div class="row g-3">
            @if ($recipes->count())
                @foreach ($recipes as $recipe)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card">
                            <img src="{{ $recipe->image }}" class="card-img-top" alt="{{ $recipe->title }}">
                            <div class="card-body">
                                <a href="{{ route('user.recipes.show', $recipe) }}" class="text-decoration-none">
                                    <h5 class="card-title text-dark">{{ $recipe->title }}</h5>
                                </a>
                                <p class="card-text">{{ $recipe->description }}</p>
                                <form action="{{ route('user.recipes.destroy', $recipe) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class='bx bx-trash'></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No recipes</p>
            @endif
        </div>
    </div>
@endsection
