@extends('layouts.appv2')

@section('content')
    <div class="container">
        <div class="mt-4 mb-5">
            <h1 class="display">Milestone Details: <b>{{ $milestone->name }}</b></h1>
        </div>
        <div>
            <table class="table table-striped">
                <tr>
                    <td class="col-3">
                        <b>Milestone Name:</b>
                    </td>
                    <td>
                        {{ $milestone->name }}
                    </td>
                </tr>
                <tr>
                    <td class="col-3">
                        <b>Target Completion Date:</b>
                    </td>
                    <td>
                        {{ $milestone->target_completionDate }}
                    </td>
                </tr>
                <tr>
                    <td class="col-3">
                        <b>Deliverable:</b>
                    </td>
                    <td>
                        {{ $milestone->deliverable }}
                    </td>
                </tr>
                <tr>
                    <td class="col-3">
                        <b>Status:</b>
                    </td>
                    <td>
                        {{ $milestone->status }}
                    </td>
                </tr>
                <tr>
                    <td class="col-3">
                        <b>Remark:</b>
                    </td>
                    <td>
                        {{ $milestone->remark }}
                    </td>
                </tr>
                <tr>
                    <td class="col-3">
                        <b>Date Updated:</b>
                    </td>
                    <td>
                        {{ $milestone->dateUpdated }}
                    </td>
                </tr>
            </table>
        </div>

        <div>
            <a class="btn btn-warning" href="{{route('milestone.edit', $milestone)}}">Edit</a>
            <form action="{{ route('milestone.destroy', $milestone) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this milestone?');">Delete</button>
            </form>
        </div>
        <div class="mt-5">
            <a class="btn btn-primary" href="{{route('grant.index')}}">Back</a>
        </div>
    </div>
@endsection
</html>