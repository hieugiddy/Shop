<?php 
ob_start();
session_start(); 
include('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}
#wrapper{
  width:500px;
  margin:auto
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
<div id="wrapper">

<h2>Shop Bán Sách</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

<ul id="myUL">
    <?php
			$sach=$conn->prepare('select * from books');
			$sach->execute();
		
			if($sach->rowCount()>0)
				while($row=$sach->fetch(PDO::FETCH_ASSOC)){
          echo '
            <li>
            <a href="themvaogiohang.php?id='.$row['id'].'"><strong style="color:red">'.$row['title'].'</strong>
            <p style="font-size:14px">Tác giả: '.$row['author'].' - Giá: '.number_format($row['price'],3,".",",").' VND</p>
            <strong style="text-align:right;display:block">Mua sách này</strong>
            </a>
          </li>
          ';
				}
    	?>
 
</ul>
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
</script>

</body>
</html>
