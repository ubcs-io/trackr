<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="media/chart.png">

    <title>Daily Dashboard</title>

  <?php #var_dump($_SERVER['HTTP_HOST']); ?>    

    <!-- Bootstrap core CSS -->
    <link href="/view/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/view/dist/css/dashboard.css" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo date('l, M jS')?></a>
        </div>

          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="/log.php">Log</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li><a href="?range=7">Week</a></li>
              <li><a href="?range=30">Month</a></li>
              <li><a href="?range=90">Quarter</a></li>
            </ul>

        </div>
      </div>
    </nav>