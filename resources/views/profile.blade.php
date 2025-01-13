@extends('layouts.appv2')

@section('content')
    <div class="container">
        <div class="mt-4 mb-5">
            <h1 class="display">User Profile</h1>
        </div>
        
        @if ($user->userCategory == 'admin')
            <!-- Admin Profile Details -->
            <div>
                <h3>Admin Details</h3>
                <table class="table table-striped">
                    <tr>
                        <td><b>Name:</b></td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td><b>Email:</b></td>
                        <td>{{ $user->email }}</td>
                    </tr>
                </table>
            </div>
        @elseif ($user->userCategory == 'academician')
            <!-- Academician Profile Details -->
            @if ($academician)
                <div>
                    <h3>Academician Details</h3>
                    <table class="table table-striped">
                        <tr>
                            <td><b>Name:</b></td>
                            <td>{{ $academician->name }}</td>
                        </tr>
                        <tr>
                            <td><b>Staff Number:</b></td>
                            <td>{{ $academician->staffNo }}</td>
                        </tr>
                        <tr>
                            <td><b>Email:</b></td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td><b>College:</b></td>
                            <td>{{ $academician->college }}</td>
                        </tr>
                        <tr>
                            <td><b>Department:</b></td>
                            <td>{{ $academician->department }}</td>
                        </tr>
                        <tr>
                            <td><b>Position:</b></td>
                            <td>{{ $academician->position }}</td>
                        </tr>
                    </table>
                </div>
            @else
                <p class="text-danger">Academician details not found.</p>
            @endif
        @endif

        <!-- Section: Grants as Project Leader -->
        <div class="mt-5">
            <h3>Grants as Project Leader</h3>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Project Title</th>
                        <th scope="col">Grant Amount</th>
                        <th scope="col">Grant Provider</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">Duration (Months)</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                @if ($grants->count() > 0)
                    <?php $i = 1; ?>
                    @foreach ($grants as $grant)
                        <tbody>
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $grant->projectTitle }}</td>
                                <td>{{ $grant->grantAmount }}</td>
                                <td>{{ $grant->grantProvider }}</td>
                                <td>{{ $grant->startDate }}</td>
                                <td>{{ $grant->durationMonth }}</td>
                                <td class="col-3">
                                    <a class="btn btn-primary" href="{{ route('grant.show', $grant) }}">View</a>
                                    <a class="btn btn-warning" href="{{ route('grant.edit', $grant) }}">Edit</a>
                                    <form action="{{ route('grant.destroy', $grant) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this grant?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7"> -- No Data -- </td>
                    </tr>
                @endif
            </table>
        </div>

        <div class="mt-5">
            <a class="btn btn-primary" href="{{ url('/homepage') }}">Back to Dashboard</a>
        </div>
    </div>
@endsection
