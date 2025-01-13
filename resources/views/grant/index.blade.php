@extends('layouts.appv2')

@section('content')
    <div class="container">
        <div class="mt-5 mb-5">
            <h1>Research Grants</h1>
        </div>
        <hr>
        <div class="mt-4">
            <h4>Registered Project</h4>
        </div>
        <div>
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
                    <?php $i=1; ?>
                    @foreach($grants as $grant)
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
        <a class="btn btn-primary" href="{{ route('grant.create') }}">
            Create
        </a>

    </div>
    @endsection
