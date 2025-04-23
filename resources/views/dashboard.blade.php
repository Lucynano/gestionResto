@extends('layouts.main') {{-- utilise le layout Bootstrap --}}

@section('title', 'Tableau de bord') {{-- titre de la page --}}

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Dashboard</h2>
        </div>
        <div class="card-body">
            <p class="text-success fw-bold">
                {{ __("You're logged in!") }}
            </p>
        </div>
    </div>
@endsection
