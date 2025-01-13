@extends('layouts.appv2')

@section('content')
    <div class="container">
        <div class="mt-4 mb-5 text-center">
            <h1 class="display-4">Create New Research Grant</h1>
            <p class="text-muted">Fill up the research grant's information below.</p>

            <div class="card shadow-lg">
                <div class="card-body">
                    <form method="POST" action="{{ route('grant.store') }}">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="projectTitle" class="form-label fw-bold">Project Title</label>
                            <input type="text" class="form-control" id="projectTitle" name="projectTitle" placeholder="Insert Project Title here" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="grantAmount" class="form-label fw-bold">Grant Amount</label>
                            <input type="number" step="0.01" class="form-control" id="grantAmount" name="grantAmount" placeholder="Insert Grant Amount here" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="grantProvider" class="form-label fw-bold">Grant Provider</label>
                            <input type="text" class="form-control" id="grantProvider" name="grantProvider" placeholder="Insert Grant Provider here" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="startDate" class="form-label fw-bold">Start Date</label>
                            <input type="date" class="form-control" id="startDate" name="startDate" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="durationMonth" class="form-label fw-bold">Duration (in Months)</label>
                            <input type="number" class="form-control" id="durationMonth" name="durationMonth" placeholder="Insert Duration here" required>
                        </div>

                        <div class="mb-3 text-start">
                            <label for="projectLeader" class="form-label fw-bold">Project Leader</label>
                            <select class="form-control" id="projectLeader" name="projectLeader" required>
                                <option value="" disabled selected>Select Project Leader</option>
                                @foreach($academicians as $academician)
                                    <option value="{{ $academician->id }}">{{ $academician->name }} ({{ $academician->email }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Save</button>
                            <button type="reset" class="btn btn-secondary"><i class="bi bi-arrow-clockwise"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-4 d-flex justify-content-between">
                <a class="btn btn-primary" href="{{ route('grant.index') }}"><i class="bi bi-arrow-left"></i> Back</a>
            </div>
        </div>
    </div>
@endsection
</html>
