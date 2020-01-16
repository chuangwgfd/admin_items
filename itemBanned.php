<?php

require_once('./db.inc.php');

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();




$sql = "UPDATE `items` 
        SET `itemStatus` = 'banned'
        WHERE `itemId` = ? ";

$count = 0;

for( $i = 0; $i < count($_POST['chk']); $i++ ){
    $arrParam = [
        $_POST['chk'][$i]
    ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($arrParam);

    $count += $stmt->rowCount();

}

if( $count > 0 ){
    header("Refresh: 3; url=./items.php");
    echo "刪除成功";
} else {
    print_r($pdo->errorInfo());
    header("Refresh: 3; url=./items.php");
    echo "failed";
}
