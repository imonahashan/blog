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


use App\classes\Category;
$massage="";
if(isset($_POST['btn'])){
    $massage = Category::addCategory($_POST);
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<?php include 'includes/menu.php' ?>



<div class="container" style="margin-top:10px">
    <div class="row">
        <div class="col-sm-8 mx-auto">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Add Blog</h3>
                </div>
                <div class="card-body">

                    <form action="" method="POST">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <select name="category_name" class="form-control">
                                    <option>---Select Category Name---</option>
                                    <option value="1">Category One</option>
                                    <option value="2">Category Two</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="blog_title" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Short Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="short_description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Long Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="long_description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="blog_image" accept="image/*"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Publication Status</label>
                            <div class="col-sm-9">
                                <input type="radio" name="status" value="1"> Published
                                <input type="radio" name="status" value="0"> Unpublished
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" name="btn" class="btn btn-success btn-block">Save Category Info</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div style="color:green;" class="card-footer text-center">
                    <h6><?php echo $massage; ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="../assets/js/jquery-3.2.1.js"></script>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>