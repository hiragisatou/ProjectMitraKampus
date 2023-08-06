@extends('master-auth')
@section('title', 'Login Page')
@section('content')

    <main>
        @auth
        <form action="{{ route('logout_handler') }}" method="post">
            @csrf
            <button type="submit">logout</button>
        </form>
        @endauth
    </main>
    @include('layouts.home.footer')

@endsection
