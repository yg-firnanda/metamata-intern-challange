@extends('user.layouts.main')

@section('pageTitle')
    Dashboard
@endsection

@section('content')
    <div class="container">
        <a href="{{ route('user.recipes.index') }}">
            <h3>Daftar Resep Saya</h3>
        </a>
    </div>
@endsection