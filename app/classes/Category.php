<?php

namespace App\classes;
use App\classes\Database;
class Category
{
    public function addCategory($data){
        $dataSend = "INSERT INTO categories(category_name,category_description,publication_status) VALUES ('$data[category_name]','$data[category_description]','$data[publication_status]')";
        if(mysqli_query(Database::dbconnection(),$dataSend)){
            $massage ="<i class=\"fa fa-check\" aria-hidden=\"true\"></i>Category added successfully!!";
            return $massage;
        }else{
            die('Query Problem'.mysqli_error(Database::dbconnection()));
        }
    }

    public function manageCategory(){
        $dataReceive = "SELECT * FROM categories";
        if(mysqli_query(Database::dbconnection(),$dataReceive)){
           $result =mysqli_query(Database::dbconnection(),$dataReceive);
           return $result;
        }else{
            die('Query Problem'.mysqli_error(Database::dbconnection()));
        }
    }

    public function editCategoryById($id){
        $dataReceive = "SELECT * FROM categories WHERE id = '$id'";
        if(mysqli_query(Database::dbconnection(),$dataReceive)){
            $result = mysqli_query(Database::dbconnection(),$dataReceive);
            return $result;
        }else{
            die('Query Problem'.mysqli_error(Database::dbconnection()));
        }
    }

    public function updateCategory($data){
        $dataSend = "UPDATE categories SET category_name='$data[category_name]',category_description='$data[category_description]',publication_status='$data[publication_status]' WHERE id='$data[id]'";
        if(mysqli_query(Database::dbconnection(),$dataSend)){
            header('Location:manage-category.php');
        }else{
            die('Query Problem'.mysqli_error(Database::dbconnection()));
        }
    }

    public function deleteCategory($id){
        $dlt = "DELETE FROM categories WHERE id= '$id'";

        if(mysqli_query(Database::dbconnection(),$dlt)){
            $massage = "Category delete successfully";
            return $massage;

        }else{
            die('Query Problem'.mysqli_error(Database::dbconnection()));
        }
    }
}