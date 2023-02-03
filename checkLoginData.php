<?php
    require_once('connection.php');
    session_start();
    if(isset($_POST['email'],$_POST['password'])&& !empty($_POST['email'])&& !empty($_POST['password'])){
        $query="select * from client where email='".$_POST['email']."' and password ='".$_POST['password']."';";
        $result=$conn->query($query);
        if($result->num_rows>0){
            $row=$result->fetch_assoc();
            $_SESSION['id']=$row['id'];
            $_SESSION['email']=$row['email'];
            $_SESSION['password']=$row['password'];
            $_SESSION['username']=$row['username'];
            header('location:index.php');
        }
        else{
            header('location:login.php');
        }
    }
    else{
        header('location:login.php');
    }