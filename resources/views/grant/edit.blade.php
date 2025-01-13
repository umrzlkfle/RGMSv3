@extends('layouts.appv2')

@section('content')
    <div class="container">
        <div class="mt-4 mb-5 text-center">
            <h1 class="display-4">Edit Project Details</h1>
            <p class="text-muted">Update the Project's information below.</p>
        </div>
        
        <div class="card shadow-lg">
            <div class="card-body">
                <form method="POST" action="{{ route('grant.update', $grant) }}">
                    @method('PUT')
                    @csrf
                    <div class="mb-3 text-start">
                        <label for="projectTitle" class="form-label fw-bold">Project Title</label>
                        <input type="text" class="form-control" id="projectTitle" name="projectTitle" placeholder="{{ $grant->projectTitle }}" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="grantAmount" class="form-label fw-bold">Grant Amount</label>
                        <input type="number" step="form-control" class="form-control" id="grantAmount" name="grantAmount" placeholder="{{ $grant->grantAmount }}" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="grantProvider" class="form-label fw-bold">Grant Provider</label>
                        <input type="text" class="form-control" id="grantProvider" name="grantProvider" placeholder="{{ $grant->grantProvider }}" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="startDate" class="form-label fw-bold">Start Date</label>
                        <input type="date" class="form-control" id="startDate" name="startDate" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="durationMonth" class="form-label fw-bold">Duration (in Months)</label>
                        <input type="number" class="form-control" id="durationMonth" name="durationMonth" placeholder="{{ $grant->durationMonth }}" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Save</button>
                        <button type="reset" class="btn btn-secondary"><i class="bi bi-arrow-clockwise"></i> Reset</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-4 d-flex justify-content-between">
            <a class="btn btn-primary me-auto" href="{{ route('grant.index') }}"><i class="bi bi-arrow-left"></i> Back</a>
            <form action="{{ route('grant.destroy', $grant) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this grant?');">Delete</button>
            </form>
        </div>
    </div>
@endsection