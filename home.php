<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.6.0.min.js"></script>
    <script src="./bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./bootstrap-4.6.0-dist/css/bootstrap.min.css">
    <title>Home</title>
    <style>
        #main{
            height:800px;
        }
        #side_nav{
            height:100%;
        }
        @media screen and (min-width: 0px) and (max-width: 500px){
          #side_nav{
            float:left;
            width:500px;
            height:400px;
            margin:15px;
          }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-primary mb-2">
        <button class="btn btn-info" id="side_nav_btn">#</button>
        <a class="navbar-brand" href="">
            <h3> Dashboard</h3>
        </a>
        <a href="logout.php" class="btn btn-danger">Log out</a>
    </nav>
    <div class="container row" id="main">
        <div class="col bg-dark p-3 rows-12" id="side_nav">
            <a href="#"><h3>About</h3></a>
        </div>
        <div class="col-9" id="main_body">
            <h3>Hi, <?php echo $_SESSION['fname']; ?></h3>
            <h4>You are logged in!</h4>
        </div>
    </div>
    <?php $uname = $_SESSION['fname'];?>;
    <script>
        var uname = <?php echo json_encode($uname);?>;
        window.addEventListener('load',function(){
            console.log(uname);
            console.log("ok");
            if(uname == null || uname == undefined){
                window.location.assign('index.php');
            }
        })
        $(document).ready(function(){
            $('#side_nav').hide();
            $("#side_nav_btn").click(function(){
                $("#side_nav").toggle();
            });
        });
    </script>
</body>
</html>