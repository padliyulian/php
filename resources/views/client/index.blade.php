@extends('layouts/main')
@section('title', 'clients')

@section('main')
    <meta name="csrf-token" content="{{csrf_token()}}">
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
                        <input type="hidden" class="js-api__token" value="{{ Auth::user()->api_token }}">
                        <table id="client-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Photo</th>
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
        @include('client.show')
    </div>
    <script type="text/javascript" src="{{ asset('/js/jquery-3.3.1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/additional-methods.min.js') }}"></script>
    <script type="text/javascript">
        let table = $('#client-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{url('/api/v1/client')}}",
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', "Bearer " + $('.js-api__token').val());
                },
            },
            columns: [
                {   
                    data: 'id',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {data: 'name', name: 'name'},
                {data: 'address', name: 'address'},
                {data: 'email', name: 'email'},
                {data: 'show_photo', name: 'show_photo'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            columnDefs: [
                {
                    'targets': 0,
                    'className': 'text-center',
                }
            ],
        });

        // closure var save_method
        let getClientMethod = (function() {
            let save_method = '';
            return {
                changeMethod: function(val) {
                    save_method = val;
                },
                value: function() {
                    return save_method;
                }
            };
        })();

        function addClient() {
            getClientMethod.changeMethod('add');
            // console.log(getClientMethod.value());
            validator.resetForm();
            $('img[name=client-view]').attr('src', '');
            $('input[name=_method]').val('post');
            $('#clientModal').modal('show');
            $('#formClient').trigger('reset');
            $('.modalClient-title').text('Add Client');
            $('.modalClient-save').text('Save');
        }
        
        function editClient(id) {
            getClientMethod.changeMethod('edit');
            // console.log(getClientMethod.value());
            validator.resetForm();
            $('img[name=client-view]').attr('src', '');
            $('input[name=_method]').val('PATCH');
            $('#formClient').trigger('reset');
            $.ajax({
                url: "{{ url('/api/v1/client/') }}" + '/' + id + "/edit",
                type: "GET",
                dataType: "JSON",
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', "Bearer " + $('.js-api__token').val());
                },
                success: function(data) {
                    $('#clientModal').modal('show');
                    $('.modalClient-title').text('Edit Client');
                    $('.modalClient-save').text('Update');
                    $('input[name=id]').val(data.id);
                    $('input[name=name]').val(data.name);
                    $('textarea[name=address]').val(data.address);
                    $('input[name=email]').val(data.email);
                    if (data.photo) {
                        $('img[name=client-view]').attr('src', '/images/client/' +data.photo);
                    } else {
                        $('img[name=client-view]').attr('src', '');
                    }
                },
                error : function() {
                    swal.fire({
                        title: 'Oops...',
                        text: 'Nothing Data!',
                        type: 'error',
                        timer: '3000'
                    })
                }
            });
        }

        function deleteClient(id){
            let csrf_token = $('meta[name="csrf-token"]').attr('content');
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url : "{{ url('/api/v1/client/') }}" + '/' + id,
                        type : "POST",
                        data : {'_method' : 'DELETE', '_token' : csrf_token},
                        beforeSend: function (xhr) {
                            xhr.setRequestHeader('Authorization', "Bearer " + $('.js-api__token').val());
                        },
                        success : function(data) {
                            table.ajax.reload();
                            swal.fire({
                                title: 'Success!',
                                text: 'Data has been deleted!',
                                type: 'success',
                            })
                        },
                        error : function () {
                            swal.fire({
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                type: 'error',
                                timer: '3000'
                            })
                        }
                    });
                }
            });
        }

        $.validator.addMethod('filesize', function (value, element, param) {
            return this.optional(element) || (element.files[0].size <= param)
        }, 'File size must be less than 200 Kb');

        let validator = $("#formClient").validate({
            errorClass: "text-danger",
            rules: {
                name: 'required',
                address: 'required',
                email: {
                    required: true,
                    email: true
                },
                'photo-client': {
                    extension: "jpg|jpeg|png",
                    filesize: 200000,
                }
            },
            submitHandler: function() {
                let id = $('#id').val();
                if (getClientMethod.value() == 'add') url = "{{ url('/api/v1/client/') }}";
                else url = "{{ url('/api/v1/client/') . '/' }}" + id;
                $.ajax({
                    url : url,
                    type : "POST",
                    // data : $('#formClient').serialize(),
                    data : new FormData($('#formClient')[0]),
                    contentType: false,
                    processData: false,
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', "Bearer " + $('.js-api__token').val());
                    },
                    success : function($data) {
                        $('#clientModal').modal('hide');
                        table.ajax.reload();
                        if (getClientMethod.value() == 'add') {
                            swal.fire({
                                title: 'Success!',
                                text: 'Data has been added!',
                                type: 'success',
                                timer: '3000'
                            })
                        } else {
                            swal.fire({
                                title: 'Success!',
                                text: 'Data has been updated!',
                                type: 'success',
                                timer: '3000'
                            })
                        }
                    },
                    error : function(e){
                        console.log(e)
                        swal.fire({
                            title: 'Oops...',
                            text: 'Email already exist!',
                            type: 'error',
                            timer: '3000'
                        })
                    }
                });
                return false;
            }
        });

        function showClient(id) {
            $.ajax({
                url: "{{ url('/api/v1/client/') }}" + '/' + id,
                type: "GET",
                dataType: "JSON",
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', "Bearer " + $('.js-api__token').val());
                },
                success: function(data) {
                    $('#clientDetail').modal('show');
                    $('.js-detail-name').text(data.name);
                    $('.js-detail-address').text(data.address);
                    $('.js-detail-email').text(data.email);
                    if (data.photo != null) {
                        $('.js-detail-photo').attr('src', '/images/client/' +data.photo);
                    } else {
                        $('.js-detail-photo').attr('src', '');
                    }
                },
                error : function() {
                    swal.fire({
                        title: 'Oops...',
                        text: 'Nothing Data!',
                        type: 'error',
                        timer: '3000'
                    })
                }
            });
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('img[name=client-view]').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('input[name=photo-client]').change(function() {
            readURL(this);
        });
    </script>
@endsection