@extends('layouts.appv2')

@section('content')
    <div class="container mt-5">
        <div class="text-center mb-5">
            <h1 class="display-4">Welcome to ResGrant Management</h1>
            <p class="lead">Your trusted partner in managing research grants efficiently and effectively.</p>
            <a href="{{ route('grant.index') }}" class="btn btn-primary btn-lg mt-3">Explore Grants</a>
        </div>

        <div class="row justify-content-center text-center">
            <div class="col-md-4 mb-4">
                <div class="card shadow h-100">
                    <div class="card-body d-flex flex-column align-items-center">
                        <i class="bi bi-person-badge-fill text-primary mb-3" style="font-size: 3rem;"></i>
                        <h5 class="card-title">Manage Academicians</h5>
                        <p class="card-text text-center">Easily manage academician profiles, track their contributions, and stay organized.</p>
                        <a href="{{ route('academician.index') }}" class="btn btn-outline-primary mt-auto">View Academicians</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow h-100">
                    <div class="card-body d-flex flex-column align-items-center">
                        <i class="bi bi-folder-fill text-success mb-3" style="font-size: 3rem;"></i>
                        <h5 class="card-title">Track Grants</h5>
                        <p class="card-text text-center">Keep track of research grants, their statuses, and funding details.</p>
                        <a href="{{ route('grant.index') }}" class="btn btn-outline-success mt-auto">View Grants</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
