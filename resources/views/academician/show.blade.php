@extends('layouts.appv2')

@section('content')
    <div class="container">
        <div class="mt-4 mb-5">
            <h1 class="display">Academician Details: <b>{{ $academician->name }}</b></h1>
        </div>
        <div>
            <table class="table table-striped">
                <tr>
                    <td class="col-3">
                        <b>Name:</b>
                    </td>
                    <td>
                        {{ $academician->name }}
                    </td>
                </tr>
                <tr>
                    <td class="col-3">
                        <b>Staff Number:</b>
                    </td>
                    <td>
                        {{ $academician->staffNo }}
                    </td>
                </tr>
                <tr>
                    <td class="col-3">
                        <b>Email:</b>
                    </td>
                    <td>
                        {{ $academician->email }}
                    </td>
                </tr>
                <tr>
                    <td class="col-3">
                        <b>College:</b>
                    </td>
                    <td>
                        {{ $academician->college }}
                    </td>
                </tr>
                <tr>
                    <td class="col-3">
                        <b>Department:</b>
                    </td>
                    <td>
                        {{ $academician->department }}
                    </td>
                </tr>
                <tr>
                    <td class="col-3">
                        <b>Position:</b>
                    </td>
                    <td>
                        {{ $academician->position }}
                    </td>
                </tr>
            </table>
        </div>

        <!--View project-->

        <div>
            <a class="btn btn-warning" href="{{route('academician.edit', $academician)}}">Edit</a>
            <form action="{{ route('academician.destroy', $academician) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this academician?');">Delete</button>
            </form>
        </div>
        <div class="mt-5">
            <a class="btn btn-primary" href="{{route('academician.index')}}">Back</a>
        </div>
    </div>
@endsection
</html>