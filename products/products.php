<?php

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtName=(isset($_POST['txtName']))?$_POST['txtName']:"";
$txtDescription=(isset($_POST['txtDescription']))?$_POST['txtDescription']:"";
$txtPrice=(isset($_POST['txtPrice']))?$_POST['txtPrice']:"";
$txtQuantity=(isset($_POST['txtQuantity']))?$_POST['txtQuantity']:"";
$txtImage=(isset($_FILES['txtImage']["name"]))?$_FILES['txtImage']["name"]:"";

$action=(isset($_POST['action']))?$_POST['action']:"";

$error=array();

$actionAdd=$actionCancel="";
$actionModify=$actionRemove="disabled";
$showModal=false;


switch($action){
    case "btnAdd":

        if($txtName==""){
            $error['Name']="Escriba el nombre";
        }
        if($txtDescription==""){
            $error['Description']="Escriba la descripción";
        }
        if($txtPrice==""){
            $error['Price']="Digite el precio";
        }
        if($txtQuantity==""){
            $error['Quantity']="Digite la cantidad";
        }

        if(count($error)>0){
            $showModal=true;
            break;
        }


        $sentence=$pdo->prepare("INSERT INTO products(Name,Description,Price,Quantity,Image) VALUES (:Name,:Description,:Price,:Quantity,:Image)");

        $sentence->bindParam(':Name',$txtName);
        $sentence->bindParam(':Description',$txtDescription);
        $sentence->bindParam(':Price',$txtPrice);
        $sentence->bindParam(':Quantity',$txtQuantity);

        $Date = new DateTime();
        $nameFile=($txtImage!="")?$Date->getTimestamp()."_".$_FILES["txtImage"]["name"]:"default.png";

        $tmpImage= $_FILES["txtImage"]["tmp_name"];

        if($tmpImage!=""){
            move_uploaded_file($tmpImage,"../images/".$nameFile);
        }

        $sentence->bindParam(':Image',$nameFile);
        $sentence->execute();

        header('Location: index.php');

    break;
    case "btnModify":

        $sentence=$pdo->prepare("UPDATE products SET
        Name=:Name, 
        Description=:Description, 
        Price=:Price, 
        Quantity=:Quantity WHERE id=:id");

        $sentence->bindParam(':Name',$txtName);
        $sentence->bindParam(':Description',$txtDescription);
        $sentence->bindParam(':Price',$txtPrice);
        $sentence->bindParam(':Quantity',$txtQuantity);
        $sentence->bindParam(':id',$txtID);
        $sentence->execute();


        $Date = new DateTime();
        $nameFile=($txtImage!="")?$Date->getTimestamp()."_".$_FILES["txtImage"]["name"]:"default.png";

        $tmpImage= $_FILES["txtImage"]["tmp_name"];

        if($tmpImage!=""){
            move_uploaded_file($tmpImage,"../images/".$nameFile);

            $sentence=$pdo->prepare("SELECT Image FROM products WHERE id=:id");
            $sentence->bindParam(':id',$txtID);
            $sentence->execute();
            $product=$sentence->fetch(PDO::FETCH_LAZY);
            print_r($product);
    
            if(isset($product["Image"])){
                if(file_exists("../images/".$product["Image"])){

                    if($product['Image']!="default.png"){
                    unlink("../images/".$product["Image"]);
                    }
                }


            $sentence=$pdo->prepare("UPDATE products SET
            Image=:Image WHERE id=:id");
    
            $sentence->bindParam(':Image',$nameFile);
            $sentence->bindParam(':id',$txtID);
            $sentence->execute();
            }
        }

        header('Location: index.php');

    break;
    case "btnRemove":

        $sentence=$pdo->prepare("SELECT Image FROM products WHERE id=:id");
        $sentence->bindParam(':id',$txtID);
        $sentence->execute();
        $product=$sentence->fetch(PDO::FETCH_LAZY);
        print_r($product);

        if(isset($product["Image"])){
            if(file_exists("../images/".$product["Image"]) && $product["Image"]!="default.png"){
                unlink("../images/".$product["Image"]);
            }
        }

        $sentence=$pdo->prepare("DELETE FROM products WHERE id=:id");
        $sentence->bindParam(':id',$txtID);
        $sentence->execute();

        header('Location: index.php');

    break;
    case "btnCancel":
        header('Location: index.php');
    break;
    case "Seleccionar":

        $actionAdd="disabled";
        $actionModify=$actionRemove=$actionCancel="";
        $showModal=true;

        $sentence=$pdo->prepare("SELECT * FROM products WHERE id=:id");
        $sentence->bindParam(':id',$txtID);
        $sentence->execute();
        $product=$sentence->fetch(PDO::FETCH_LAZY);

        $txtName=$product['Name'];
        $txtDescription=$product['Description'];
        $txtPrice=$product['Price'];
        $txtQuantity=$product['Quantity'];
        $txtImage=$product['Image'];

    break;

}
    $sentence= $pdo->prepare("SELECT * FROM `products` WHERE 1");
    $sentence->execute();
    $listProducts=$sentence->fetchAll(PDO::FETCH_ASSOC);

?>