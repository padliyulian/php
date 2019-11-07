@extends('layouts/main')
@section('title', 'projects')

@section('main')
    <div class="container">
        <div class="row">
            @include('message.success')
            <div class="col">
                <h5>List Of Project</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                    <form action="" method="get">
                        <input
                            type="text"
                            name="keyword"
                            class="form-control @error('keyword') is-invalid @enderror"
                            placeholder="Search project by name or team then press enter ..."
                            autocomplete="off"
                        >
                        @error('keyword')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </form>
                </div>
            </div>
            <div class="col-md-2 mb-2">
                <a href="{{ url('/project/create') }}" class="btn btn-success btn-block">
                    <i class="fas fa-user-plus"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col">Project</th>
                                <th scope="col">Description</th>
                                <th scope="col">Team</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (!$projects->isEmpty())
                                @foreach ($projects as $key => $project)
                                <tr>
                                    <td scope="row" class="text-center">{{ $projects->firstItem() + $key }}</td>
                                    <td scope="row">{{ $project->project}}</td>
                                    <td scope="row">{{ $project->description }}</td>
                                    <td scope="row">
                                        @foreach ($project->employees as $employee)
                                            {{ $employee->name }},
                                        @endforeach
                                    </td>                               
                                    <td scope="row" class="j-mw-100">
                                        <a href="{{ url('/project/'.$project->id.'/edit') }}" class="btn btn-sm btn-warning">
                                            <span style="color: white;"><i class="fas fa-edit"></i></span>
                                        </a>
                                        <form action="{{ url('/project/'.$project->id) }}" method="POST" class="d-inline js-form__delete">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="d-inline btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-danger text-center">No data to view ...</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">{{$projects->links()}}</div>
                </div>    
            </div>
        </div>
    </div>
@endsection