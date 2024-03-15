@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url("/home") }}">All User</a></li>
                            <li class="breadcrumb-item active">Edit User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit User</h3>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ url("user/".$user->id."/update") }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name..." value="{{ $user->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter email" value="{{ $user->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Change Password</label>
                                <input type="password" name="password" value="{{ $user->password }}" class="form-control" id="exampleInputPassword1"
                                       placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="address">
                                    User Address
                                    <button type="button" name="add" id="add" class="btn btn-sm btn-success pull-right">Add
                                        More
                                    </button>
                                </label>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dynamic_field">

                                        @foreach($user->user_address as $address)
                                            @foreach(json_decode($address['address']) as $data)
                                                <tr>
                                                    <td style="width: 90%">
                                                        <input type="text" name="address[]" placeholder="Enter user address" class="form-control name_list" value="{{ $data }}">
                                                    </td>
                                                    <td>
                                                        <button type="button" id="{{ $address['id'] }}" name="remove" class="btn btn-danger btn_remove">X</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                </div>
            </div>

        </section>
    </div>
@endsection

@section("footer")
    <script>
        $(document).ready(function () {
            const postURL = "<?php echo url('addmore'); ?>";
            let i = {{ $user->user_address->count() + 1 }};


            $('#add').click(function () {
                i++;
                $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added">' +
                    '<td><input type="text" name="address[]" placeholder="Enter your Name" class="form-control name_list" /></td><td>' +
                    '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button>' +
                    '</td>' +
                    '</tr>');
            });


            $(document).on('click', '.btn_remove', function () {
                const button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });
        });
    </script>
@endsection
