<?php
require('../connection.php');
session_start();
if (empty($_SESSION["id"])) {
  header('Location: ../login.php');
}
elseif ($_SESSION["id"] != 1) {
    header('Location: ../index.php');
}
    if(isset($_GET['idel'])){
        $sql = "delete from product where id=".$_GET['idel'];
        $conn->query($sql);
        header('Location:./products.php');
    }
    if(isset($_POST['upd'])){
        if (!empty($_FILES['img1']['name'])) {
            $name = $_FILES['img1']['name'];
            $target = '../image/'.$_FILES['img1']['name'];
            unlink('../image/'. $_POST['img']);
            move_uploaded_file($_FILES['img1']['tmp_name'],$target);
            
            header('Location:./products.php');}
        else{
            $name = $_POST['img'];
        }
            $sql1 = 'update product set title ="'.$_POST['title'].'" , description ="'.$_POST['desc'].'" , price ='.$_POST['prix'].' , imageLocation = "'.$name.'" , quantityInStore ='.$_POST['qte'].' , category ="'.$_POST['cat'].'" where id ='.$_POST['id'];
            $conn->query($sql1);
            header('Location:./products.php');  
    }
?>