<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title ?> | Bbc MVC</title>

    <!-- Bootstrap core CSS -->
      <link href="https://fonts.googleapis.com/css?family=Monoton|Poppins:100i,100" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">SuppArt</a>

            <?php
            if(!isset($_SESSION['LoggedIn'])) {

            echo "
                <form id='login' method='post' action='/login'>
                    <p class='login_title'>
                        E-Mail
                        <input type='email' name='loginemail' value='' required class='login'>
                    </p>
                    <p class='login_title' >
                        Password
                        <input type='password' name='loginpassword' value='' required class='login'>
                        <input type='submit' name='loginsend' value='Login' class='login'>
                        
                    </p>
                    
                </form>
                ";
            }
            else{
                echo "
                <a id='postlink' href='/upload'>Post a Picture</a>
                ";
            }
            ?>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="listload">
                <li>
                    <a href="/post/">Drawings</a>
                    <!--
                    <ul>
                        <a href="digital.html">Digital</a>
                        <a href="hand.html">Handmade</a>
                    </ul>-->
                </li>
                <!--
                <li>
                    <a href="/portrait.html">Photographs</a>
                    <ul>
                        <a href="scenery.html">Scenery</a>
                        <a href="portrait.html">Portrait</a>
                    </ul>
                </li>
                -->
                <?php

                    if(!isset($_SESSION['LoggedIn'])) {

                        echo "    
                        <!-- <li ><a href = '/login/' > Login</a></li> -->
                        <li ><a href = '/registration/' > Registration</a></li>
                        ";
                    }

                    else{
                        echo "
                        <li><a href = '/logout/doLogout' > Logout</a></li>
                        ";
                        }
                ?>
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <h1 class="subtitles"><?= $subtitle?></h1>

