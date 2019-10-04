@extends('layouts/main')
@section('title', 'employee detail')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="/storage/img/employee/{{ $employee->photo }}" class="card-img-top" alt="photo">
                    <div class="card-body">
                        <h5 class="card-title">{{ $employee->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $employee->nik }}</h6>
                        <p class="card-text">
                            Sex : {{ $employee->sex }} <br>
                            Email : {{ $employee->email }} <br>
                            Position: {{ $employee->position->position }}
                        </p>
                        <a href="{{ url('/employee') }}" class="btn btn-primary btn-sm">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection