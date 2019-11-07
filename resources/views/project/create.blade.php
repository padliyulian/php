@extends('layouts/main')
@section('title', 'project add')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('project.store') }}" method="post">
                    @csrf
                    @include('partial.form.project', [
                        'btn_title' => 'Add',
                        'project' => new App\Models\Project,
                    ])
                </form>
            </div>
        </div>
    </div>
@endsection