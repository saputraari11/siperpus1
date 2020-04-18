<?php
session_start();
if (isset($_SESSION["id_petugas"])) {
	header("Location : http://localhost/siperpus/index.php");
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
	
<script src="http://localhost/siperpus/asset/jquery.js"></script>
  <link rel="stylesheet" href="http://localhost/siperpus/asset/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://localhost/siperpus/asset/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="http://localhost/siperpus/asset/logad.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
<script src="https://unpkg.com/feather-icons"></script>

	<div class="container">
        <div class="row">
            <div class="col log">
                <i data-feather="user" class="bc rounded-circle"></i>
                <form method="post"action="proses-login.php">
                    <div class="form-group user">
                        <div class="row">
                            <div class="col-lg-1"><i for="u" data-feather="user"></i></div>
                            <div class="col-lg-10">
                                <input type="text" id="#u" name="username" class="form-control nb" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">

                            </div>
                        </div>
                    </div>
                    <div class="form-group pass">
                        <div class="row">
                            <div class="col-lg-1 "> <i data-feather="lock" for="p"></i></div>
                            <div class="col-lg-10">
                                <input type="password" class="form-control nb" name="password" id="exampleInputPassword1" placeholder="Password" id="p">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" name="i" class="form-check-input checkbox" id="exampleCheck1">
                        <label class="form-check-label mn" for="exampleCheck1"> Check me out</label>
                    </div>
                    <div class="form-group form-check">
                        <label class="form-check-label " for="exampleCheck1">Sign In?</label>
                        <a href="regiad.php">sign</a>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnlogin">Submit</button>
                </form>
            </div>
        </div>
	</div>
	
    <script>
        feather.replace()
    </script>
</body>

</html>