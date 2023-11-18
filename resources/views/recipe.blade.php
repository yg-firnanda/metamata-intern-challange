@extends('layouts.main')

@section('pageTitle')
    {{ $recipe->title }}
@endsection

@section('content')
    <div class="container">
        <div class="mt-4">
            <img src="{{ $recipe->image }}" alt="" class="w-100">
            <h3>{{ $recipe->title }}</h3>
            <p>{{ $recipe->description }}</p>
            <h5>Bahan-bahan</h5>
            @if ($ingredients)
                <ul>
                    @foreach ($ingredients as $ingredient)
                        <li>{{ $ingredient->ingredient }}</li>
                    @endforeach
                </ul>
            @else
                <p>No ingredients available for this recipe.</p>
            @endif
            <h5>Langkah Pembuatan</h5>
            @if ($steps)
                <ol>
                    @foreach ($steps as $step)
                        <li>{{ $step->step }}</li>
                    @endforeach
                </ol>
            @else
                <p>No steps available for this recipe.</p>
            @endif
        </div>
    </div>
@endsection