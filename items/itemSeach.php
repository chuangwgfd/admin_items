<?php

header('Content-Type: application/json; charset=utf-8'); //設定資料類型
require_once('../template/db.inc.php'); //引入資料庫連線

$keyword = $_POST['keyword'];

$sql = " SELECT `itemId`, `itemName`, `itemImg`, `itemCategoryId`, 
                `itemSellerId`, `itemPrice`, `itemQty`, `itemStatus`, 
                `updated_at`
        FROM `items`
        WHERE `itemName` LIKE '%$keyword%'";



$stmt = $pdo->prepare($sql);
$stmt->execute();


$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($arr);