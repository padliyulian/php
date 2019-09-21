@extends('layouts/main')
@section('title', 'employee add')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ url('/employee') }}" method="POST">
                    @csrf
                    @include('partial.form', [
                        'btn_title' => 'Add',
                        'employee' => new App\Employee,
                    ])
                </form>
            </div>
        </div>
    </div>
@endsection