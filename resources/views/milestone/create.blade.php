@extends('layouts.appv2')

@section('content')
<div class="container">
<div class="mt-4 mb-5 text-center">
    <h1 class="display-4">Create New Milestone</h1>
    <p class="text-muted">Fill up the milestone's information below.</p>

    <div class="card shadow-lg">
        <div class="card-body">
            <form method="POST" action="{{ route('milestone.store') }}">
                @csrf
                <div class="mb-3 fw-bold text-start">
                    <label class="form-label">Project Name: {{$grant->projectTitle}}</label>
                </div>

                <div class="mb-3 text-start">
                    <label for="name" class="form-label fw-bold">Milestone Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Insert Milestone Name here" required>
                </div>
                <div class="mb-3 text-start">
                    <label for="target_completionDate" class="form-label fw-bold">Target Completion Date</label>
                    <input type="date" class="form-control" id="target_completionDate" name="target_completionDate" required> 
                </div>
                <div class="mb-3 text-start">
                    <label for="deliverable" class="form-label fw-bold">Deliverable</label>
                    <textarea class="form-control" id="deliverable" name="deliverable" rows="3" placeholder="Provide a brief description of the deliverable" required></textarea>
                </div>
                <div class="mb-3 text-start">
                    <input class="form-control" id="grant_id" name="grant_id" value="{{ $grant->id }}" hidden> 
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Save</button>
                    <button type="reset" class="btn btn-secondary"><i class="bi bi-arrow-clockwise"></i> Reset</button>
                </div>

            </form>
        </div>
    </div>
    <div class="mt-4 d-flex justify-content-between">
        <a class="btn btn-primary" href="{{ route('grant.show', $grant) }}"><i class="bi bi-arrow-left"></i> Back</a>
    </div>
</div>

</div>
@endsection
