<?php
    session_start();
    if($_SESSION['id'] == null){
        header('Location:index.php');
    }

    require_once "../vendor/autoload.php";
    $login= new App\classes\login();

    if(isset($_GET['logout'])){
        $login->adminLogOut();
    }
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <?php include 'includes/menu.php' ?>


    <script src="../assets/js/jquery-3.2.1.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
