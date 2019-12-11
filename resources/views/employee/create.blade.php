@extends('layouts/main')
@section('title', 'employee add')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ url('/employee') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('partial.form.employee', [
                        'btn_title' => 'Add',
                        'employee' => new App\Models\Employee,
                    ])
                </form>
            </div>
        </div>
    </div>
@endsection