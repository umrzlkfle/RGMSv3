@extends('layouts.appv2')

@section('content')
    <div class="container">
        <div class="mt-4 mb-5">
            <h4>Add New Member</h4>
            <form action="{{ route('grant.addMember', $grant) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="academician_id" class="form-label">Select Academician</label>
                    <select name="academician_id" id="academician_id" class="form-select" required>
                        @foreach($academicians as $academician)
                            <option value="{{ $academician->id }}">{{ $academician->name }} ({{ $academician->email }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-select" required>
                        <option value="member">Member</option>
                        <option value="leader">Leader</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Add Member</button>
            </form>
        </div>
    </div>
@endsection
