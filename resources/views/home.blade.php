@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-success">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body text-success">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in as "'.Auth::user()->name.'" ('.Auth::user()->role->name.')')}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mx-auto w-75 mt-4">
    <div class="row">
        <div class="col-sm-6">
            <div class="card mt-2">
                <div class="card-header text-center">
                    <h5 class="card-title">Account settings</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Everything you would like to do with your account.</p>
                    <div class="btn-group-vertical w-100">
                        <a href="{{route('edituser',['id'=>Auth::user()->id,'action'=>0])}}" class="badge badge-primary btn-block mb-1 p-2">Change your name</a>
                        <a href="{{route('edituser',['id'=>Auth::user()->id,'action'=>1])}}" class="badge badge-primary btn-block mb-1 p-2">Change your e-mail</a>
                        <a href="{{route('edituser',['id'=>Auth::user()->id,'action'=>2])}}" class="badge badge-warning btn-block mb-1 p-2">Change your password</a>
                        <a href="{{ route('deleteuser', Auth::user()->id) }}" class="badge badge-danger btn-block mb-1 p-2" onclick="return confirm('You are about to delete your account. Are you sure?')"><i class="fa fa-trash-o"></i>Delete your account</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card mt-2">
                <div class="card-header text-center">
                    <h5 class="card-title">Manage your posts</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Here you can see all your posts, edit them or even delete them if you want.</p>
                    <div class="table-responsive">
                    <table data-toggle="table" class="table table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Summary</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($postsdata as $posts)
                            @if(count($posts)>0)
                            @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->summary}}</td>
                                <td>{{$post->updated_at}}</td>
                                <td>
                                    @if($post->user_id == \Auth::user()->id)
                                        <div class="btn-group-vertical">
                                        <a href="{{ route('show', $post) }}" class="btn btn-info btn-sm"
                                           title="Show"> Show </a>
                                        <a href="{{ route('editpost', $post) }}" class="btn btn-success btn-sm"
                                           title="Edit"> Edit </a>
                                        <a href="{{ route('deletepost', $post) }}"
                                           class="btn btn-danger btn-sm"
                                           onclick="return confirm('Are you sure?')"
                                           title="Delete"><i class="fa fa-trash-o"></i> Delete
                                        </a>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center text-dark btn-outline-warning font-weight-bold">
                                        You haven't created any posts yet!
                                    </td>
                                </tr>
                                @break
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card mt-2">
                <div class="card-header text-center">
                    <h5 class="card-title">Manage your comments</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Here you can see and manage all your comments</p>
                    <div class="table-responsive">
                        <table data-toggle="table" class="table table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th>For the post</th>
                                <th>Message</th>
                                <th>Updated at</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(count($commentsdata)>0)
                                    @foreach($commentsdata as $comments)
                                        <tr>
                                            <td>{{$comments->post->title}} </td>
                                            <td>{{$comments->message}}</td>
                                            <td>{{$comments->updated_at}}</td>
                                            <td>
                                                @if($comments->user_id == \Auth::user()->id)
                                                    <div class="btn-group-vertical">
                                                        <a href="{{ route('show', $comments->post_id) }}" class="btn btn-info btn-sm"
                                                           title="Show"> Show related post</a>
                                                        <a href="{{ route('editcomment', $comments->id) }}" class="btn btn-success btn-sm"
                                                           title="Edit"> Edit </a>
                                                        <a href="{{ route('deletecomment', $comments->id) }}"
                                                           class="btn btn-danger btn-sm"
                                                           onclick="return confirm('Are you sure?')"
                                                           title="Delete"><i class="fa fa-trash-o"></i> Delete
                                                        </a>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center text-dark btn-outline-warning font-weight-bold">
                                            You haven't commented anything yet!
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        </div>
        <div class="col-sm-6">
            <div class="card mt-2">
                <div class="card-header text-center">
                    <h5 class="card-title">Add a new post</h5>
                </div>
                <div class="card-body">
                    @if(\Auth::user()->role->name=='writer' or \Auth::user()->role->name=='admin')
                    <p class="card-text">Click the button below to jump to the creation page.</p>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('createpost') }}" class="btn btn-lg btn-outline-success">Create new post!</a>
                    </div>
                    @else
                        <div class="alert alert-warning" role="alert">
                            Your current status is <strong>{{ \Auth::user()->role->name }}</strong>. Only writers can add posts!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
