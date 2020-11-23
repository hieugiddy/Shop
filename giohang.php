<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
</style>
</head>
<body>
<div style="width:500px;margin:auto">

<h2>Giỏ hàng</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

<ul id="myUL">
 
  <?php
		if(!isset($_SESSION['id_sp'])){
			echo 'Không có sản phẩm nào';
		}
		else{
			for($i=0;$i<count($_SESSION['id_sp']);++$i){
				
                    echo '<li>
                    <a href="javascript:void(0)"><strong style="color:red">'.$_SESSION['tensanpham'][$i].'</strong>
                    <p style="font-size:14px">Tác giả: '.$_SESSION['author'][$i].'<br/><br/>
                    <span style="font-size:14px">Số lượng:</span>
                    <input type="number" min="1" name="soluong" id="'.$_SESSION['id_sp'][$i].'" value="'.$_SESSION['soluong'][$i].'" onchange="capnhat(this)"/><br/><br/>
                    <span style="font-size:14px">Giá:</span> '.number_format($_SESSION['price'][$i]*$_SESSION['soluong'][$i],3,".",",").' VND</p>
                    <a href="xoa.php?id='.$_SESSION['id_sp'][$i].'"><strong style="text-align:right;display:block">Xóa sách này</strong></a>
                    </a>
                  </li>';
				
			}
		}
	?>
</ul>
<br/>
<center><a href="/Shop">Về trang chủ</a></center>
</div>

<script>
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
function capnhat(obj){
    var id=obj.id;
    var soluong=obj.value;
    var str='capnhap.php?id='+id+'&soluong='+soluong;
    location.href=str;
  }


</script>

</body>
</html>
