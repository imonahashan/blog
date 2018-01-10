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
$result = Category::manageCategory();
$massage="";
if(isset($_GET['delete'])){
    $id = $_GET['id'];
    $massage = Category::deleteCategory($id);
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
        <div class="col-sm-10 mx-auto">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Manage Category</h3>
                </div>
                <div class="card-body">

                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">SL NO</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Category Description</th>
                            <th scope="col">Publication Status</th>
                            <th scope="col" colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while($category=mysqli_fetch_assoc($result)){?>
                        <tr>
                            <th scope="row"><?php echo $category['id'];?></th>
                            <td><?php echo $category['category_name'];?></td>
                            <td><?php echo $category['category_description'];?></td>
                            <td><?php echo $category['publication_status'];?></td>

                            <td>
                                <a href="edit.php?id=<?php echo $category['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </td>
                            <td>
                                <a href="?delete=true&id=<?php echo $category['id']; ?>" onclick="return confirm('Are you sure to delete this?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-center">
                    <h6 style="color:green;"><?php echo $massage; ?></h6>
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