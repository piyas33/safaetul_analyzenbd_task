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
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">All user</a></li>
                            <li class="breadcrumb-item active">Restore user</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Restore Deleted User</h3>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($deletedUsers as $key => $user)
                            <tr>
                                <th scope="row"> {{ ++$key }}</th>
                                <td>
                                    @if(is_null($user->image))
                                        <img src="{{ asset('user.png') }}" class="img-circle img-size-32 mr-2"
                                             alt="User Image">
                                    @else
                                        <img src="{{ asset($user->image) }}" class="img-circle img-size-32 mr-2"
                                             alt="User Image">
                                    @endif
                                </td>
                                <td>{{ $user->name ?? "" }}</td>
                                <td>{{ $user->email ?? "" }}</td>
                                <td>
                                    @if(!is_null($user->user_address))
                                        <ul>
                                            @foreach($user->user_address as $address)
                                                @foreach(json_decode($address['address']) as $data)
                                                    <li>{{ $data }}</li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-outline-success btn-sm" href="{{ "restore/".$user->id }}">
                                        <i class="fas fa-trash-restore-alt"></i> Restore
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection
