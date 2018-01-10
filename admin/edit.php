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
$id = $_GET['id'];
$result = Category::editCategoryById($id);
$category = mysqli_fetch_assoc($result);

$massage="";
if(isset($_POST['btn'])){
    $massage = Category::updateCategory($_POST);
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
                    <h3>Edit Category</h3>
                </div>
                <div class="card-body">

                    <form action="" method="post">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Category Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo $category['category_name']?>" name="category_name">
                                <input type="hidden" class="form-control" value="<?php echo $category['id']?>" name="id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Category Description</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="category_description"><?php echo $category['category_description']?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Publication Status</label>
                            <div class="col-sm-8">
                                <input type="radio" name="publication_status" value="No">Unpublished
                                <input type="radio" name="publication_status" value="Yes">Published
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" name="btn" class="btn btn-success btn-block">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
<!--                <div style="color:green;" class="card-footer text-center">-->
<!--                    <h6>--><?php //echo $massage; ?><!--</h6>-->
<!--                </div>-->
            </div>
        </div>
    </div>
</div>



<script src="../assets/js/jquery-3.2.1.js"></script>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>