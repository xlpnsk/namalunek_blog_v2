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
    <title>namalunek | About</title>


</head>
@include('layouts.navbar')
<body class="antialiased">

<header class="bg-light py-5 mb-5">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-12">
                <h1 class="display-4 text-black mt-5 mb-2">namalunek&reg;</h1>
                <p class="lead mb-5 text-muted-50">blog website design created for the final credit of the Web Application Development course</p>
            </div>
        </div>
    </div>
</header>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h2>About website</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p>
            <p><a href="/proj/public/docs/namalunek_TAIProject_Lipinski.html">Project doc in Polish</a></p>
            <h3 class="my-3">What have I used?</h3>
            <ul>
                <li>Bootstrap <a href="https://getbootstrap.com/docs/4.3/getting-started/introduction/">v4.3</a> and <a href="https://getbootstrap.com/docs/5.0/getting-started/introduction/">v5.0</a></li>
                <li>Bootstrap tutorials found on the Internet</li>
                <li>Docs from <a href="https://mdbootstrap.com/">MDBootrstrap</a></li>
                <li><a href="https://laravel.com/docs/8.x">Laravel 8.x</a></li>
                <li>Laravel tutorials found on the Internet</li>
                <li><a href="https://regexr.com/">RegExr</a> for testing Regular Expressions</li>
                <li>Icons from <a href="https://fontawesome.com/">Font Awsome</a></li>
                <li><a href="https://www.w3schools.com/default.asp">W3Schools</a> tutorials</li>
            </ul>
            <br/>
        </div>
        <div class="col-lg-6">
            <a href="/proj/public/photos/code.bmp" class="strip">
                <img class="img-fluid rounded mb-4" src="/proj/public/photos/code.bmp" alt="kod">
            </a>
        </div>
    </div>
</div>
</body>
<!-- /.container -->

<!-- Footer -->
@include('layouts.foot')

</html>
