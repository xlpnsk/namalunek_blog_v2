@extends('layouts.adminApp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-info">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body text-info">
                            <div class="alert alert-info" role="alert">
                                Welcome to the Admin panel, <strong>{{Auth::user()->name}}</strong>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto w-75 mt-4">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Manage users
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table data-toggle="table" class="table table-hover">
                                <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Role</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($users)>0)
                                    @foreach($users as $userdata)
                                        <tr>
                                            <td>{{$userdata->id}} </td>
                                            <td>{{$userdata->name}}</td>
                                            <td>{{$userdata->email}}</td>
                                            <td>{{$userdata->role->name}}</td>
                                            <td>{{$userdata->created_at}}</td>
                                            <td>
                                                    <div class="btn-group-vertical">
                                                        <a class="btn btn-primary" data-toggle="collapse" href="#roleEdit{{$userdata->id}}" role="button" aria-expanded="false" aria-controls="roleEdit{{$userdata->id}}">
                                                            Change user role
                                                        </a>
                                                        <a href="{{ route('deleteuser', $userdata->id) }}"
                                                           class="btn btn-danger btn-sm"
                                                           onclick="return confirm('You are about to delete {{$userdata->name}} ({{$userdata->role->name}}) account. Are you sure?')"
                                                           title="Delete"><i class="fa fa-trash-o"></i> Delete
                                                        </a>
                                                    </div>
                                            </td>
                                        </tr>
                                        <tr class="collapse" id="roleEdit{{$userdata->id}}"><td colspan="6">
                                                <div>
                                                    <div class="card card-body">
                                                        <form action="{{ route('changerole', $userdata) }}" id="user{{$userdata->id}}-form"
                                                              method="post" enctype="multipart/form-data" >
                                                            {{ csrf_field() }}
                                                            <input name="_method" type="hidden" value="PUT">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <label class="input-group-text" for="newrole_id">New role for <strong>{{$userdata->name}}</strong></label>
                                                                </div>
                                                                <select class="custom-select" id="newrole_id" name="newrole_id">
                                                                    <option value="3" selected>Choose...</option>
                                                                    <option value="1" disabled>Admin</option>
                                                                    <option value="2">Writer</option>
                                                                    <option value="3">User</option>
                                                                </select>
                                                                <div class="input-group-append">
                                                                    <button type="submit" class="btn btn-success" value="updaterole{{$userdata->id}}">Submit</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center text-dark btn-outline-danger font-weight-bold">
                                            There are no users!
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Manage posts and comments
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <p class="card-text">Click the button below to see Admin' Content Manager.</p>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('admincontent') }}" class="btn btn-lg btn-outline-info">Admin' Content Manager</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

