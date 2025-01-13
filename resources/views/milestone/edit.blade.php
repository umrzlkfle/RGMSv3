@extends('layouts.appv2')

@section('content')
<div class="container">
    <div class="mt-4 mb-5 text-center">
        <h1 class="display-4">Edit Milestone for Grant: {{ $grant->projectTitle }}</h1>
        <p class="text-muted">Update the Project's information below.</p>
    </div>
    <div class="card shadow-lg">
        <div class="card-body">
            <form method="POST" action="{{ route('milestone.update', $milestone) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Milestone Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $milestone->name }}" disabled>
                </div>

                <div class="mb-3">
                    <label for="target_completionDate" class="form-label">Target Completion Date</label>
                    <input type="date" class="form-control" id="target_completionDate" name="target_completionDate" value="{{ $milestone->target_completionDate }}" disabled> 
                </div>

                <div class="mb-3">
                    <label for="deliverable" class="form-label">Deliverable</label>
                    <input type="text" class="form-control" id="deliverable" name="deliverable" value="{{ $milestone->deliverable }}" disabled>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="Pending">Pending</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="remark" class="form-label">Remarks</label>
                    <textarea class="form-control" id="remark" name="remark">{{ $milestone->remark }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="dateUpdated" class="form-label">Date Update (Pick Today)</label>
                    <input type="date" class="form-control" id="dateUpdated" name="dateUpdated" required> 
                </div>

                <button type="submit" class="btn btn-primary">Update Milestone</button>
            </form>
        </div>
    </div>
</div>
@endsection
