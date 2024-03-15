@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User List</h3>
                    <div class="card-tools">

                        <a href="{{ "user/create" }}" class="btn btn-outline-success">
                            Create User
                        </a>

                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Photo:</th>
                                <th scope="row">
                                    <img src="{{ asset($user->image) }}" class="img-circle img-size-32 mr-2" alt="User Image">
                                </th>
                            </tr>
                            <tr>
                                <th scope="row">Name:</th>
                                <th scope="row">{{ $user->name }}</th>
                            </tr>
                            <tr>
                                <th scope="row">Email:</th>
                                <th scope="row">{{ $user->email }}</th>
                            </tr>
                            <tr>
                                <th scope="row">Address:</th>
                                <th scope="row">
                                    <ul>
                                        @foreach($user->user_address as $address)
                                            @foreach(json_decode($address['address']) as $data)
                                                <li>{{ $data }}</li>
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection
