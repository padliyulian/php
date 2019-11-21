@extends('layouts/main')
@section('title', 'clients')

@section('main')
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5>List Of Client</h5>
                        <button onClick="addClient()" class="btn btn-primary btn-md">
                            Add Client
                        </button>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="client-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('partial.form.client')
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" ></script>
    <script type="text/javascript">
        let table = $('#client-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('api.client')}}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'address', name: 'address'},
                {data: 'email', name: 'email'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            columnDefs: [
                {
                    "targets": 0,
                    "className": "text-center",
                }
            ],
        });

        let save_method = '';
        function addClient() {
            save_method = 'add';
            $('input[name=_method]').val('post');
            $('#clientModal').modal('show');
            $('#formClient').trigger('reset');
            $('.modalClient-title').text('Add Client');
        }

        $("#formClient").validate({
            errorClass: "text-danger",
            rules: {
                name: 'required',
                address: 'required',
                email: {
                    required: true,
                    email: true
                }
            },
            submitHandler: function() {
                let id = $('#id').val();
                if (save_method == 'add') url = "{{ url('client') }}";
                else url = "{{ url('client') . '/' }}" + id;
                $.ajax({
                    url : url,
                    type : "POST",
                    data : $('#formClient').serialize(),
                    success : function($data) {
                        $('#clientModal').modal('hide');
                        table.ajax.reload();
                    },
                    error : function(){
                        alert('email already exist');
                    }
                });
                return false;
            }
        });
    </script>
@endsection