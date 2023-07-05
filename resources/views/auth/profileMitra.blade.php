@extends('home.master')
@section('title', 'Profil Mitra')
@section('content')

<div class="container wow fadeIn d-flex justify-content-center align-items-center" data-wow-delay="0.1s">
    <div class="card">
        <div class="card-header">
            <h2 class="">Lengkapi Profile</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('profileHandler') }}">
                @csrf

            </form>
        </div>
    </div>
</div>
@endsection
