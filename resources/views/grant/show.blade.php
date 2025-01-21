@extends('layouts.appv2')

@section('content')
    <div class="container">
        <div class="mt-4 mb-5">
            <h1 class="display">Grant Details: <b>{{ $grant->projectTitle }}</b></h1>
        </div>
        <div>
            <table class="table table-striped">
                <tr>
                    <td class="col-3">
                        <b>Project Title:</b>
                    </td>
                    <td>
                        {{ $grant->projectTitle }}
                    </td>
                </tr>
                <tr>
                    <td class="col-3">
                        <b>Grant Provider:</b>
                    </td>
                    <td>
                        {{ $grant->grantProvider }}
                    </td>
                </tr>
                <tr>
                    <td class="col-3">
                        <b>Grant Amount:</b>
                    </td>
                    <td>
                        {{ $grant->grantAmount }}
                    </td>
                </tr>
                <tr>
                    <td class="col-3">
                        <b>Start Date:</b>
                    </td>
                    <td>
                        {{ $grant->startDate }}
                    </td>
                </tr>
                <tr>
                    <td class="col-3">
                        <b>Duration (In Month):</b>
                    </td>
                    <td>
                        {{ $grant->durationMonth }}
                    </td>
                </tr>


            </table>
        </div>
        <div>
            <a class="btn btn-primary" href="{{ route('milestone.create', $grant->id) }}">Add Milestone</a>
            <a class="btn btn-warning" href="{{route('grant.edit', $grant)}}">Edit</a>
            <form action="{{ route('grant.destroy', $grant) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this grant?');">Delete</button>
            </form>
        </div>
        
        <!-- Milestones Section -->
        <div class="mt-5">
            <h3>Project Milestones</h3>
            @if($grant->milestones->isEmpty())
                <p class="text-muted">No milestones have been added for this project yet.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Target Completion Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($grant->milestones as $milestone)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $milestone->name }}</td>
                                <td>{{ $milestone->target_completionDate }}</td>
                                <td>{{ ucfirst($milestone->status) }}</td>
                                <td>
                                    <a href="{{ route('milestone.show', $milestone) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('milestone.edit', $milestone) }}" class="btn btn-warning btn-sm">Update</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <!-- Project Members Section -->
        <div class="mt-5">
            <h3>Project Members</h3>
            @if($grant->academicians->isEmpty())
                <p class="text-muted">No members have been added to this project yet.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($grant->academicians as $academician)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $academician->name }}</td>
                                <td>{{ $academician->email }}</td>
                                <td>{{ ucfirst($academician->pivot->role) }}</td>
                                <td>
                                    @if($academician->pivot->role !== 'leader')
                                        <form action="{{ route('grant.removeMember', [$grant, $academician]) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this member?');">Remove</button>
                                        </form>
                                    @else
                                        <span class="text-muted">Leader</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            <a class="btn btn-primary mt-3" href="{{ route('grant.selectMember', $grant) }}">Add Member</a>
        </div>
        
        <div class="mt-5">
            <a class="btn btn-primary" href="{{route('grant.index')}}">Back</a>
        </div>
    </div>
@endsection
</html>


