<?php

require('connection.php');
session_start();
        if (isset($_POST['sub'])) {
            
            $queryre = 'delete from command where idc='.$_SESSION['id'].' and idp='.$_POST['id'].' and orderDate like "'.$_POST['date'].'"';
            
            if ($conn->query($queryre)) {
                header("Location:./cart.php");
            }
        }
       
        

        if (isset($_POST['ach'])) {
            $queryac = 'update command set isSaled = 1 where idc='.$_SESSION['id'].' and isSaled = 0';
            $conn->query($queryac);
                
            
            $p=0;
            while (isset($_POST['id'.$p])) {
                
                $queryup = 'update product set quantityInStore =quantityInStore - '.$_POST['qte'.$p].' where id='.$_POST['id'.$p];
                $conn->query($queryup);
                $p++;
            
            }
            header("Location:./cart.php");
        }
       
        
    
?>