@extends('layouts.plain')

@section('pageTitle')
    Register Page
@endsection

@section('content')
    <div class="container">
        <div class="d-flex flex-column justify-content-center align-items-center w-100 vh-100">
            <h3>Register Form</h3>
            <form action="{{ route('register.index') }}" method="POST" class="shadow-lg p-3 rounded-3" style="width: 400px">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Register</button>
            </form>
        </div>
    </div>
@endsection