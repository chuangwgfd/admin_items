<?php
// require_once("./checkSession.php");
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();
require_once("./db.inc.php");

$sql = "INSERT INTO `items`(`itemImg`, `itemName`, `itemDescription`,                                    `itemCategoryId`, `itemMaterial`, `itemBrandId`, `itemPrice`, 
                    `itemQty`, `itemSize`)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

if( $_FILES["itemImg"]["error"] == 0 ){
    $itemImg = date("YmdHis");
    $extension = pathinfo($_FILES["itemImg"]["name"], PATHINFO_EXTENSION);
    $imgFileName = $itemImg.".".$extension;

    if(!move_uploaded_file($_FILES["itemImg"]["tmp_name"], "./files/".$imgFileName)){
        header("Refresh: 3; url=./items.php");
        echo "uploading failed";
        exit();
    }
}

$arrParam = [
    $imgFileName,
    $_POST['itemName'],
    $_POST['itemDescription'],
    $_POST['itemCategoryId'],
    $_POST['itemMaterial'],
    $_POST['itemBrandId'],
    $_POST['itemPrice'],
    $_POST['itemQty'],
    $_POST['itemSize']
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

// if(!$stmt){
//     print_r($pdo->errorInfo());
//     exit();
// }


if( $stmt->rowCount() > 0 ){
    header("Refresh: 3; url=./items.php");
    echo "Success";
    exit();
} else {
    // print_r($pdo->errorInfo());
    // header("Refresh: 3; url=./items.php");
    echo "failed";
    exit();
}