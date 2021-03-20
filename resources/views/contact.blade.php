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
    <script src="https://kit.fontawesome.com/c1ac8cb8ce.js" crossorigin="anonymous"></script>
    <title>namalunek | Contact</title>


</head>
@include('layouts.navbar')
<body class="antialiased">
<!-- Page Content -->
<div class="container">
    <div class="card text-center border-top-0">
        <div class="card-body">
            <h3 class="card-title">Contact data</h3>
            <hr>
            <h6 class="card-subtitle my-3 text-muted">This project was carried out by:</h6>
            <p class="card-text"><strong>Lipiński Adam</strong></p>
            <p class="card-text">adam.lipinski@pollub.edu.pl</p>
            <br/>
            <p class="card-text"><strong>Lublin University of Technology</strong></p>
            <p class="card-text">Nadbystrzycka 38 D</p>
            <p class="card-text">20–618 Lublin</p>
            <p class="card-text">POLAND</p>
            <p class="card-text"><a href="http://en.pollub.pl/pl" class="text-decoration-none">POLLUB Web page</a></p>
            <br/>
            <h6 class="card-subtitle mb-2 text-muted">Check out our social media</h6>
            <!-- Facebook -->
            <a style="color: #3b5998" href="#!" role="button"
            ><i class="fab fa-2x fa-facebook-square"></i></a>

            <!-- Google -->
            <a style="color: #ed302f" href="#!" role="button"
            ><i class="fab fa-2x fa-youtube"></i></a>

            <!-- Instagram -->
            <a style="color: #ac2bac" href="#!" role="button"
            ><i class="fab fa-2x fa-instagram"></i></a>

            <!-- Linkedin -->
            <a style="color: #0082ca" href="#!" role="button"
            ><i class="fab fa-2x fa-linkedin"></i></a>

            <!-- Github -->
            <a style="color: #333333" href="#!" role="button"
            ><i class="fab fa-2x fa-github"></i></a>
        </div>
    </div>
</div>
</body>
<!-- /.container -->

<!-- Footer -->
@include('layouts.foot')

</html>

