<?php
ob_start();
session_start();

$id=$_GET['id'];
$sl=$_GET['soluong'];

for($i=0;$i<count($_SESSION['id_sp']);++$i){
	if($_SESSION['id_sp'][$i]==$id){
		$_SESSION['soluong'][$i]=$sl;
	}
}
echo '
<script>
	history.back();
</script>';
?>