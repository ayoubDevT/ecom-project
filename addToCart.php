<?php
    require_once ('connection.php');
    session_start();
    if(!empty(isset($_SESSION['id']))){
        $s=isset($_POST['s'])?1:0;
        echo $s;
        echo $_SESSION['id'];
        echo $_POST['idp'];
        echo $_POST['qte'];
        $query='insert into command (idc,idp,quantity,isSaled) values ('.$_SESSION['id'].','.$_POST['idp'].','.$_POST['qte'].','.$s.')';
        $result=$conn->query($query);
        if($s==1){
            $query='update product set quantityInStore =quantityInStore-'.$_POST['qte'].' where id='.$_POST['idp'];
            $result=$conn->query($query);
        }
        header('location:single-product.php?id='.$_POST['idp']);
    }
    else{
        header('login.php');
    }