@extends('user.layouts.main')

@section('pageTitle')
    Create New Product
@endsection

@section('content')
    <div class="container mt-3 mb-5">
        <h1>Tulis Resepmu...</h1>
        <form action="{{ route('user.recipes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="10" name="description">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3" id="ingredient-container">
                <label for="ingredients">Bahan bahan</label>
                <div id="ingredients-wrapper">
                    <input type="text" name="ingredient[]" class="ingredient form-control mb-3" />
                </div>
                <button type="button" onclick="duplicateIngredient()" class="btn btn-primary">+ Item Bahan</button>
            </div>
            <div class="mb-3">
                <label for="step">Langkah pembuatan</label>
                <div class="steps-wrapper">
                    <input type="text" name="step[]" class="step form-control mb-3" id="step">
                </div>
                <button type="button" onclick="duplicateStep()" class="btn btn-primary">+ Item Langkah</button>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Upload Foto</label>
                <input type="text" class="form-control" id="title" name="image" value="{{ old('image') }}">
            </div>
            <button type="submit" class="btn btn-primary">Terbitkan Resep</button>
        </form>
    </div>
@endsection