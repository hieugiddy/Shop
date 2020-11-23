<?php
ob_start();
session_start();
for($i=0;$i<count($_SESSION['id_sp']);++$i){
    if($_SESSION['id_sp'][$i]==$_GET['id']){
        unset($_SESSION['id_sp'][$i]);
        unset($_SESSION['tensanpham'][$i]);
        unset($_SESSION['soluong'][$i]);
        unset($_SESSION['author'][$i]);
        unset($_SESSION['price'][$i]);
        echo '
        <script>
            history.back();
        </script>';
    }
}
	

?>