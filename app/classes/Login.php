<?php
namespace App\classes;
use App\classes\Database;
use MongoDB\Driver\Query;

class Login
{
    public function adminLogInCheck($data){
        $email=$data['email'];
        $password=md5($data['password']);

        $sql = "SELECT * FROM users WHERE email ='$email' AND password='$password' ";
        if(mysqli_query(Database::dbconnection(),$sql)){
            $queryResult=mysqli_query(Database::dbconnection(),$sql);
            $user=mysqli_fetch_assoc($queryResult);

            if($user){
                session_start();
                $_SESSION['id']=$user['id'];
                $_SESSION['name']=$user['name'];

                header('Location:dashboard.php');
            }else{
                $massage = "*Please use valid email address & password";
                return $massage;
            }

        }else{
            die("Query problem".mysqli_error(Database::dbconnection()));
        }

    }

    public function adminLogOut(){
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        header('Location:index.php');
    }
}