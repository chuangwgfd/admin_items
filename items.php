<?php
// require_once('./checkSession.php');
require_once('./db.inc.php');

$sqlTotal = "SELECT count(`itemId`) AS `count` FROM `items`";
$total = $pdo->query($sqlTotal)->fetch(PDO::FETCH_NUM)[0];
$numPerPage = 10;
$totalPages = ceil($total/$numPerPage);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = $page < 1  ? 1 : $page;


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AQUA ADMIN</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	
	
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/bootstrap4-table.css" rel="stylesheet">
	<script src="./js/sorttable.js"></script>   
	

</head>
<body>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <!-- navbar -->
            
    </nav>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar"> 
        <!-- sidebar -->
    </div>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <!-- main -->
        <div class="row"> <!-- breadcrumb -->
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Forms</li>
			</ol>
        </div>
        <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">商品列表</h1>
			</div>
		</div>
        <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">全部</div>
					<div class="panel-body">
						<div class="col-md-12">
							<span class="large col-lg-3"><?php echo $total; ?> Products</span>
							<div class="col-lg-offset-9">
							<a class="" href="./itemNew.php"><button type="button" class="btn btn-lg btn-danger">＃編輯類別</button></a>
							<a class="" href="./itemNew.php"><button type="button" class="btn btn-lg btn-danger">＋新增商品</button></a>
							</div>

							<table class="table sortable">
								<thead class="thead-light">
									<tr>
										<th class="text-center" scope="col ">
											<div class="checkbox">
												<label>
													<input type="checkbox" value="">
												</label>
											</div>
										</th>
										<th scope="col">商品ID</th>
										<th scope="col">圖片</th>
										<th scope="col">商品名稱</th>
										<th scope="col">類別</th>
										<th scope="col">賣家ID</th>
										<th scope="col">價格</th>
										<th scope="col">數量</th>
										<th scope="col">已售出</th>
										<th scope="col">狀態</th>
										<th scope="col">操作</th>
									</tr>
                                </thead>
								<tbody>
								<?php
                                $sql = "SELECT `itemId`, `itemName`, `itemImg`, `itemCategoryId`, 
                                               `itemSellerId`, `itemPrice`, `itemQty`, `itemStatus`, 
                                               `updated_at`
                                        FROM `items`
                                        LIMIT ?, ?";
                                $arrParam = [
                                    ($page - 1) * $numPerPage,
                                    $numPerPage];

                                $stmt = $pdo->prepare($sql);
                                $stmt->execute($arrParam);
                                if($stmt->rowCount() > 0){
                                    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    for($i = 0; $i < count($arr); $i++){
                                ?>
									<tr>
										<td class="text-center" scope="col ">
											<div class="checkbox">
                                                <input type="checkbox" style="position: unset;" name="chk[]" value="<?php echo $arr[$i]['itemId'] ?>">
											</div>
										</td>
                                        <td><?php echo $arr[$i]['itemId']?></td>
										<td>
                                            <img style="max-width: 100px " src="./files/<?php echo $arr[$i]['itemImg'] ?>">
										</td>
										<td><?php echo $arr[$i]['itemName']?></td>
										<td><?php echo $arr[$i]['itemCategoryId']?></td>
										<td><?php echo $arr[$i]['itemSellerId']?></td>
										<td><?php echo "\$".$arr[$i]['itemPrice']?></td>
										<td><?php echo $arr[$i]['itemQty']?></td>
										<td>-</td>
										<td><?php echo $arr[$i]['itemStatus']?></td>
										<td>
                                            <a  href="./itemEdit.php?editId=<?php echo $arr[$i]['itemId'] ?>" onclick="return confirm('Are you sure?')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>修改 </a>
                                            <a href="./itemDelete.php?deleteId=<?php echo $arr[$i]['itemId'] ?>" onclick="return confirm('是否確定要刪除?')"><i class="fa fa-trash-o" aria-hidden="true"></i>刪除 </a>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                }
                                ?>
								</tbody>
								<tfoot>
									<tr>
										<td class="border" colspan="11">
										<?php
										for($i = 1; $i <= $totalPages; $i++){
										?>
										<a href="?page=<?php echo $i ?>"><?php echo $i ?></a>
										<?php
										}
										?>
										</td>
									</tr>
								</tfoot>
                            </table>
                        </div>
                    </div>		
				</div>
			</div>
		</div>





	</div>    
	

</body>
</html>