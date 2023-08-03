@extends('master-auth')
@section('title', 'Login Page')
@section('content')

<main>
    <form action="{{ route('logout_handler') }}" method="post">
    @csrf
    <button type="submit">logout</button>

</form>
</main>
	@include('layouts.home.footer')

@endsection
