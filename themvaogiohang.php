<?php
ob_start();
session_start();

include('connect.php');
$getsl=$conn->prepare('select * from books where id="'.$_GET['id'].'"');
$getsl->execute();
$rs=$getsl->fetch(PDO::FETCH_ASSOC);

function ktr_tontai($id){
	for($i=0;$i<count($_SESSION['id_sp']);++$i){
		if($_SESSION['id_sp'][$i]==$id){
			return $i;
		}
	}
	return -1;
}

if(isset($_SESSION['id_sp'])){
	if(ktr_tontai($_GET['id'])==-1){
		$index=count($_SESSION['id_sp']);
		$_SESSION['id_sp'][$index]=$_GET['id'];
		$_SESSION['tensanpham'][$index]=$rs['title'];
        $_SESSION['author'][$index]=$rs['author'];
        $_SESSION['price'][$index]=$rs['price'];
		$_SESSION['soluong'][$index]=(int)1;
	}
	else{
        if(!isset($_GET['soluong']))
            $_SESSION['soluong'][ktr_tontai($_GET['id'])]+=1;
        else
		    $_SESSION['soluong'][ktr_tontai($_GET['id'])]+=(int)$_GET['soluong'];
	}
}
else{
    $_SESSION['id_sp'][0]=$_GET['id'];
    $_SESSION['tensanpham'][0]=$rs['title'];
    $_SESSION['author'][0]=$rs['author'];
    $_SESSION['price'][0]=$rs['price'];
    $_SESSION['soluong'][0]=(int)1;
}
echo '<script>
alert("Thêm sản phẩm thành công");
location.href=\'/Shop/giohang.php\';</script>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
</body>
</html>