@extends('layouts/main')
@section('title', 'meetings')

@section('main')
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5>List Of Meeting</h5>
                        <a href="{{url('/api/v1/meeting/create')}}" class="btn btn-primary btn-md js-meeting__add">
                            Add Meeting
                        </a>
                    </div>
                    <div class="card-body table-responsive">
                        <table data-order='[[ 0, "desc" ]]' id="meeting-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Time</th>
                                    <th>Location</th>
                                    <th>Team</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('partial.form.meeting')
    </div>
    <script type="text/javascript" src="{{ asset('/js/jquery-3.3.1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript">
        // data table
        let table = $('#meeting-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{url('/api/v1/meeting')}}",
            columns: [
                {   
                    data: 'id',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {data: 'name', name: 'name'},
                {data: 'description', name: 'description'},
                {data: 'time', name: 'time'},
                {data: 'location', name: 'location'},
                {data: 'team', name: 'team'},
                {data: 'action', name: 'action'},
            ],
            columnDefs: [
                {
                    'targets': 0,
                    'className': 'text-center',
                }
            ],
        });

        // show modal
        $('body').on('click', '.js-meeting__add, .js-meeting__edit', function(e){
            e.preventDefault();
            let url = $(this).attr('href');
            $('.js-meeting__title').text($(this).hasClass('meeting-edit') ? 'Edit Meeting' : 'Add Meeting');
            $('.js-meeting__btn').text($(this).hasClass('meeting-edit') ? 'Update' : 'Save');
            $.ajax({
                url: url,
                dataType: 'html',
                success: function (response) {
                    $('.js-meeting__mbody').html(response);
                }
            });
            getMeetingTeamId.clearTeam();
            $('.js-meeting__btn').show();
            $('#meetingModal').modal('show');
        });

        // save meeting
        $('.js-meeting__btn').click(function(ev){
            ev.preventDefault();

            let form = $('.js-meeting__mbody form');
            let url = form.attr('action');
            let meeting_method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';

            form.find('.invalid-feedback').remove();
            form.find('.form-control').removeClass('is-invalid');

            $.ajax({
                url : url,
                method: meeting_method,
                data : form.serialize(),
                success: function (response) {
                    form.trigger('reset');
                    $('#meetingModal').modal('hide');
                    table.ajax.reload();
                    console.log(response);

                    if (meeting_method == 'POST') {
                        swal.fire({
                            type : 'success',
                            title : 'Success!',
                            text : 'Data has been saved!'
                        });
                    } else {
                        swal.fire({
                            type : 'success',
                            title : 'Success!',
                            text : 'Data has been updated!'
                        });
                    }
                },
                error : function (xhr) {
                    let res = xhr.responseJSON;
                    if ($.isEmptyObject(res) == false) {
                        $.each(res.errors, function (key, value) {
                            $('#' + key)
                                .closest('.form-control')
                                .addClass('is-invalid')
                                .closest('.form-group')
                                .append(`<div class="invalid-feedback">${value}</div>`);
                        });
                    }
                }
            })
        });

        // add meeting team button
        $('body').on('click', '#s_meeting_team option', function(){
            $('.js-meeting__teams').append('<li><input type="hidden" value="'+$(this).val()+'">'+$(this).text()+' - <span class="text-danger js-meeting__team-delete" style="cursor: pointer;">delete</span></li>');
            $(this).attr('disabled', true);
            let x = parseInt($(this).val());
            
            if ($('.js-meeting__teams_id').val()) {
                $('.js-meeting__teams_id').val(function(i, oldval) {
                    return `${oldval},${x}`;
                });
            } else {
                getMeetingTeamId.addTeam(parseInt($(this).val()));
                $('.js-meeting__teams_id').val(getMeetingTeamId.value());
            }
        });

        // del team button
        $('body').on('click', '.js-meeting__team-delete', function () {
            let team = $(this).prev().val();
            $('#s_meeting_team option').each(function() {
                if($(this).val() == team) {
                    $(this).attr('disabled', false);
                }
            });

            let oldTeams = $('.js-meeting__teams_id').val();
            let oldTeamsArr = oldTeams.split(',');
            let newTeam = [];
            let newTeams = '';
            oldTeamsArr.map(item => item != team && newTeam.push(item));
            newTeams = newTeam.toString();

            if ($('.js-meeting__teams_id').val('')) {
                getMeetingTeamId.clearTeam();
            }
            $('.js-meeting__teams_id').val(newTeams)

            $(this).parentsUntil('.js-meeting__teams').remove();
        });

        // show detail meeting button
        $('body').on('click', '.js-meeting__show', function (event) {
            event.preventDefault();

            let me = $(this),
                url = me.attr('href');

            $('.js-meeting__title').text('Detail Meeting');
            $('.js-meeting__btn').hide();

            $.ajax({
                url: url,
                dataType: 'html',
                success: function (response) {
                    $('.js-meeting__mbody').html(response);
                }
            });

            $('#meetingModal').modal('show');
        });

        // delete meeting button
        $('body').on('click', '.js-meeting__delete', function (event) {
            event.preventDefault();

            let me = $(this),
                url = me.attr('href'),
                csrf_token = $('meta[name="csrf-token"]').attr('content');

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
                        url : url,
                        type : "POST",
                        data : {'_method' : 'DELETE', '_token' : csrf_token},
                        success : function(response) {
                            table.ajax.reload();
                            console.log(response);
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
        });

        // closurlet teamId
        let getMeetingTeamId = (function() {
            let teamId = [];
            function addVal(val) {
                teamId.push(val);
            }
            return {
                clearTeam: function() {
                    teamId = [];
                },
                addTeam: function($id) {
                    addVal($id);
                },
                value: function() {
                    return teamId;
                }
            };
        })();
    </script>
@endsection