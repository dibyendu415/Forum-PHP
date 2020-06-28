<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <title>PHP FORUM with Categories</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Discussion Forum</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/forum/index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
            <form method="get" action="search.php" class="form-inline my-2 my-lg-0" >
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <div class="mx-2">
            <?php
                session_start();
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
                {
                    echo '<div class="btn btn-primary">Hello '.$_SESSION['user_name'].'</div>
                    <a href="partials/logout.php" class="btn btn-primary" >LOGOUT</a>';
                }
                else
                {
                    echo '<div class="btn btn-primary" data-toggle="modal" data-target="#loginmodal">LOGIN</div>
                    <div class="btn btn-primary" data-toggle="modal" data-target="#signupmodal">Signup</div>';
                }
                ?>
            </div>
        </div>
    </nav>
    <?php include('loginmodal.php');
      include('signupmodal.php'); 
      if (isset($_GET['signup']) && $_GET['signup'] == "true")
      {
          echo "<div class='alert alert-success' role='alert'>
                    Accounnt added Successfully!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
      }
      ?>