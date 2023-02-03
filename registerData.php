<?php
    require_once('connection.php');

    session_start();
    if(isset($_POST['email'],$_POST['password'],$_POST['username'],$_POST['conferm'])&&
     !empty($_POST['email'])&& 
     !empty($_POST['password'])&&
     !empty($_POST['username'])&&
     !empty($_POST['conferm'])&&
     $_POST['password']==$_POST['conferm']){
    $query="insert into client (email,username,password) values ('".$_POST['email']."','".$_POST['username']."','".$_POST['password']."') ";
        $result=$conn->query($query);
        header('location:login.php');
    }
    else{
        header('location:register.php');
    }