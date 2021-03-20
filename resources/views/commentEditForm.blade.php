<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>namalunek | Edit post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css"> <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"> </script> <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"> </script> <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"> </script>

    <style>
        body{
            background-color: #e8e8e8;
        }
        .title{
            text-align: center;
            background-color: transparent
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/proj/public/photos/logo2.png" alt="logo" width="166" height="73">
        </a>
        <ul class="navbar-nav mr-auto">
            <li><div class="badge badge-secondary text-wrap" style="width: 6rem;">
                    Comment editor
                </div></li>
        </ul>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item dropdown dropright">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('home') }}" role="button">
                        Home
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="d-flex justify-content-center">
    <div class="card w-75 p-3">
        <div class="card-header text-center">
            <div class="card-title"> <h3>Edit your comment</h3> </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body">
            <!-- form start -->
            <form role="form"  action="{{ route('updatecomment', $comment) }}" id="comment-form"
                  method="post" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                <div>
                    <div class="form-group{{ $errors->has('message')?'has-error':'' }}" id="roles_box">
                        <div class="mb-3">
                            <label for="message" class="form-label font-weight-bold">Message</label>
                            <textarea class="form-control" name="message" id="message" cols="20" rows="5" maxlength="300">{{$comment->message}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group" role="group" aria-label="First group">
                        <button type="submit" class="btn btn-success">Edit!</button>
                    </div>
                    <div class="btn-group">
                        <a href="{{route('show',$comment->post->id)}}}" class="btn btn-primary" role="button">Show related post</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

