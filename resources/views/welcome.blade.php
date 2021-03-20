<!DOCTYPE html>
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
        <title>namalunek</title>


    </head>
    @include('layouts.navbar')
    <body class="antialiased">

    <div class="mx-auto w-75">
        <!-- Carousel -->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://images.unsplash.com/photo-1583095117886-ed164e400ff9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" class="d-block w-100" style="max-height: 500px" alt="pic1">
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1556025329-cb01a7e2ab3b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1351&q=80" class="d-block w-100" style="max-height: 500px" alt="pic2">
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1523215986639-cb8e22e2b23a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" class="d-block w-100" style="max-height: 500px" alt="pic3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    <!-- Call to Action Well -->
    <div class="card text-white bg-secondary my-5 py-4 text-center">
        <div class="card-body">
            <p class="text-white m-0">Discover the strange world of outdated aesthetics, animals, brutalism, paintings, sky, lopsided images... Have I already mentioned animals?<br/> Welcome to namalunek&reg;</p>
        </div>
    </div>

    <!-- Content Row -->
        @if(count($postdata)>0)
            <div class="row">
            @foreach($postdata as $post)
                <div class="col-md-6 mb-5">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{$post->photo}}" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title">{{$post->title}}</h2>
                            <p class="card-text">{{$post->summary}}</p>
                            <p class="card-text"><small class="text-muted">Last updated: {{$post->updated_at}}</small></p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route("show",$post->id) }}" class="btn btn-dark" >More Info</a>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-4 -->
            @endforeach
            </div>
        @else
            <div class="alert alert-info text-center" role="alert">
                <h4 class="alert-heading">Not so fast!</h4>
                <p>No posts yet ;(</p>
                <p>Come back later :)</p>
                @guest
                <hr>
                <p class="mb-0">Or you can <a href="{{ route('register') }}" class="alert-link">create an account</a> and help us with the creation process </p>
                @endguest
            </div>
        @endif
    </div>
    </body>
    @include('layouts.foot')
</html>
