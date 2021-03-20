<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">        <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"> </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

    <title>namalunek | {{ $postdata->title }}</title>

    <style>
        body{
            background-color: #e8e8e8;
        }
        .title{
            text-align: center;
            background-color: transparent
        }
        .table-container{
            background-color: white;
            max-width: 900px;
            margin: 0 auto;
        }
        .footer-button{
            background-color: transparent;
            float: right;
            margin-top: 3%;
        }
        table{
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    <body class="antialiased">
    <div class="mx-auto w-75">
        <div class="card">
            <img src="{{ $postdata->photo }}" class="card-img-top" alt="post_photo" style="max-height: 500px">
            <div class="card-body">
                <div class="jumbotron jumbotron-fluid">
                    <h1 class="display-4">{{ $postdata->title }}</h1>
                    <p class="lead">{{ $postdata->summary }}</p>
                    <hr class="my-4">
                    <p class="font-monospace">{{ $postdata->content }}</p>
                </div>
                <div class="float-end">
                <span class="badge rounded-pill bg-secondary fw-light">
                    Author: {{$postdata->user->name}}<br/>
                    Last updated: {{ $postdata->updated_at }}
                </span>
                </div>
        </div>
    </div>
    <!--comments-->
        <div class="table-container overflow-auto border border-3 border-dark my-2">
            <div class="title">
                <h3>Comments</h3>
            </div>
            @auth
                @if(count($comments)>0)
                @foreach($comments as $comment)
                    <div class="card border-dark mb-3">
                        <div class="card-body">
                            <blockquote class="blockquote mb-0 text-dark">
                                <p>{{$comment->message}}</p>
                                <footer class="blockquote-footer fs-6">{{$comment->user->name}}<cite title="Add date"> ({{$comment->updated_at}})</cite></footer>
                            </blockquote>
                        </div>
                        @if($comment->user_id == \Auth::user()->id)
                            <div class="card-footer">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="{{ route('editcomment',$comment->id) }}" class="btn btn-outline-warning btn-sm me-md-2" title="Edit">Edit</a>
                                    <a href="{{ route('deletecomment',$comment->id) }}" class="btn btn-outline-danger btn-sm" title="Delete">Delete</a>
                                </div>
                            </div>
                        @endif
                    </div>
                    @endforeach
                @else
                    <div class="alert alert-dark" role="alert">
                        <strong>Be the first one to comment on this post!</strong>
                    </div>
                @endif
                    <form role="form"  action="{{ route('createcomment',$postdata->id) }}" id="comment-form"
                          method="post" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="message" name="message" maxlength="300"></textarea>
                            <label for="message">Your comment</label>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-1">
                                <button type="submit" class="btn btn-success">Add!</button>
                            </div>
                        </div>

                    </form>
            @endauth
        </div>
        @guest
            <div class="table-container">
                <div class="alert alert-dark" role="alert">
                    <a href="{{ route('login') }}" class="alert-link">Log in</a> or <a href="{{ route('register') }}" class="alert-link">create an account</a> to view and write comments!
                </div>
            </div>
        @endguest
    </div>
    </body>
    @include('layouts.foot')
</html>
