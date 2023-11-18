@extends('layouts.main')

@section('pageTitle')
    Recipes
@endsection

@section('content')
    <div class="container">
        <h4 class="my-3">Resep Terbaru</h4>
        <div class="row g-3">
            @if ($recipes->count())
                @foreach ($recipes as $recipe)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card">
                            <img src="{{ $recipe->image }}" class="card-img-top" alt="{{ $recipe->title }}">
                            <div class="card-body">
                                <a href="{{ route('recipe', $recipe) }}" class="text-dark text-decoration-none">
                                    <h5 class="card-title">{{ $recipe->title }}</h5>
                                </a>
                                <p class="card-text">{{ $recipe->description }}</p>
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
