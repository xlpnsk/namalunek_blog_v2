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
        <div class="accordion border-dark" id="accordionExample">
            <div class="card text-white bg-dark">
                <div class="card-header d-flex justify-content-center" id="headingZero" >
                    <h3 class="mb-0">
                        Admin' Content Manager
                    </h3>
                </div>
            </div>
            <div class="card border-dark">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Manage posts
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
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Summary</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($posts)>0)
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>{{ $post->summary }}</td>
                                            <td>{{ $post->created_at }}</td>
                                            <td>{{ $post->updated_at}}</td>
                                            <td>
                                                <div class="btn-group-vertical">
                                                    <a href="{{ route('show', $post) }}" class="btn btn-info btn-sm"
                                                       title="Show"> Show </a>
                                                    <a href="{{ route('deletepost', $post) }}"
                                                       class="btn btn-danger btn-sm"
                                                       onclick="return confirm('You are about to delete the post with id={{ $post->id }}. Are you sure?')"
                                                       title="Delete"><i class="fa fa-trash-o"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center text-dark btn-outline-danger font-weight-bold">
                                            There are no posts!
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
                                Manage comments
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table data-toggle="table" class="table table-hover">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Belongs to</th>
                                        <th>Correlated post</th>
                                        <th>Message</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($comments)>0)
                                        @foreach($comments as $comment)
                                            <tr>
                                                <td>{{ $comment->id }}</td>
                                                <td>{{ $comment->user->name }}</td>
                                                <td>{{ $comment->post->title }}</td>
                                                <td>{{ $comment->message }}</td>
                                                <td>{{ $comment->created_at }}</td>
                                                <td>{{ $comment->updated_at}}</td>
                                                <td>
                                                    <div class="btn-group-vertical">
                                                        <a href="{{ route('show', $comment->post->id) }}" class="btn btn-info btn-sm"
                                                           title="Show"> Show correlated post</a>
                                                        <a href="{{ route('deletecomment', $comment) }}"
                                                           class="btn btn-danger btn-sm"
                                                           onclick="return confirm('You are about to delete the comment with id={{ $comment->id }}. Are you sure?')"
                                                           title="Delete"><i class="fa fa-trash-o"></i> Delete
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center text-dark btn-outline-danger font-weight-bold">
                                                There are no comments!
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-group dropright float-right mt-3">
            <a type="button" class="btn btn-secondary dropdown-toggle" href="{{ route('admin') }}">
                Back
            </a>
    </div>
        @endsection
