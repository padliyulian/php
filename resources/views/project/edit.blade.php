@extends('layouts/main')
@section('title', 'project edit')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/project/{{$project->id}}" method="post">
                    @method('patch')
                    @csrf
                    @include('partial.form.project', ['btn_title' => 'Update'])
                </form>
            </div>
        </div>
    </div>
@endsection