<?php
    require_once('../connection.php');
    
    if (isset($_POST['sub'])) {
        
        if (!empty($_FILES['fileUpload']['name'])) {
            $target = '../image/'.$_FILES['fileUpload']['name'];
            move_uploaded_file($_FILES['fileUpload']['tmp_name'],$target);
            $sql='insert into product(title,description,price,imageLocation,quantityInStore,category)values("'.$_POST["nom"].'","'.$_POST["desc"].'",'.$_POST["prix"].',"'.$_FILES["fileUpload"]["name"].'",'.$_POST["qte"].',"'.$_POST["cat"].'")';
            $conn->query($sql);
        }
    }
    header('Location:./form.php');
    
?>