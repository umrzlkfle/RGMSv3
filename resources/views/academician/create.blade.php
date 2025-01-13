@extends('layouts.appv2')

@section('content')
    <div class="container">
        <div class="mt-4 mb-5 text-center">
            <h1 class="display-4">Create New Academician</h1>
            <p class="text-muted">Fill up the academician's information below.</p>

            <div class="card shadow-lg">
                <div class="card-body">
                    <form method="POST" action="{{ route('academician.store') }}">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="name" class="form-label fw-bold">Academician's Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Insert name here" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="staffNo" class="form-label fw-bold">Staff Number</label>
                            <input type="text" class="form-control" id="staffNo" name="staffNo" placeholder="Insert Staff Number here" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Insert Email here" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="college" class="form-label fw-bold">College</label>
                            <input type="text" class="form-control" id="college" name="college" placeholder="Insert College here" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="department" class="form-label fw-bold">Department</label>
                            <input type="text" class="form-control" id="department" name="department" placeholder="Insert Department here" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="position" class="form-label fw-bold">Position</label>
                            <select id="position" name="position" class="form-control" required>
                                <option value="">-- Choose Position --</option>
                                <option value="Professor">Professor</option>
                                <option value="Associate Professor">Associate Professor</option>
                                <option value="Senior Lecturer">Senior Lecturer</option>
                                <option value="Lecturer">Lecturer</option>
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
                <a class="btn btn-primary" href="{{ route('academician.index') }}"><i class="bi bi-arrow-left"></i> Back</a>
            </div>
        </div>
    </div>
    @endsection
</html>