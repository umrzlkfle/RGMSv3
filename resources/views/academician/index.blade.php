@extends('layouts.appv2')

@section('content')
    <div class="container">
        <div class="mt-5 mb-5">
            <h1>Academician</h1>
        </div>
        <hr>
        <div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Staff Number</th>
                        <th scope="col">Email</th>
                        <th scope="col">College</th>
                        <th scope="col">Department</th>
                        <th scope="col">Position</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                @if ($academicians->count() >0 ) 
                    <?php $i=1; ?>
                    @foreach($academicians as $academician)
                <tbody>
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$academician->name}}</td>
                        <td>{{$academician->staffNo}}</td>
                        <td>{{$academician->email}}</td>
                        <td>{{$academician->college}}</td>
                        <td>{{$academician->department}}</td>
                        <td>{{$academician->position}}</td>
                        <td class="col-3">
                            <a class="btn btn-primary" href="{{route('academician.show', $academician)}}">View</a>
                            <a class="btn btn-warning" href="{{route('academician.edit', $academician)}}">Edit</a>
                            
                            <form action="{{ route('academician.destroy', $academician) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this academician?');">Delete</button>
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
        <a class="btn btn-primary"
            href="{{route('academician.create')}}" >
            Create
        </a>
    </div>
@endsection
</html>