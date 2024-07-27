<style>
    * { 
    margin: 0;
    padding: 0;
    box-sizing: border-box;
	font-family: Arial, sans-serif;
}     
.container1 {
  background-color: #00544f;
  padding: 1px;
  text-align: center;
}

#minimenu {
  padding: 10px;
}

.main-menu1 {
  list-style-type: none;
  padding: 0;
  margin: 0;

}

.main-menu1 > li {
  position: relative;
}

.main-menu1 > li > a {
  display: block;
  padding: 10px;
  color: #fff;
  text-decoration: none;
  cursor: pointer;
}

.main-menu1 > li:hover > a {
  background-color: none;
  display: inline-block;
  color: aqua;
}

.sub-menu {
  display: none;
  position: absolute;
  top: 100%;
  left: 5px;
  background-color: #00544f;
  padding: 10px;
  border: 2px solid #fff;
  text-align: left;

}

.main-menu1 > li:hover .sub-menu {
  display: block;
  font-size: 20px;
  

}

.tensp {
  display: block;
  padding: 5px;
  border: 0px solid #fff;
  cursor: pointer;
  margin: 5px;
  margin-left: 10px;
  display: inline-block;
  background-color: #00544f;
  color: #fff;
 
}

.tensp:hover {
  display: inline-block;
  color: aqua;
  cursor: pointer;
  
}

	
</style>
<!DOCTYPE>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<div class="container1">
	<nav>
		<div id="minimenu">
			<ul class="main-menu1">
				<li>
					<a class="hover">Mì cay</a>
					<ul class="sub-menu">
						<form method="post" action="SP.php">
							<li><input class="tensp" name="tensp" type="submit" value="Mỳ Cay Gà"></li>
							<li><input class="tensp" name="tensp" type="submit" value="Mỳ Cay Hải Sản"></li>	
							<li><input class="tensp" name="tensp" type="submit" value="Mỳ Cay Thập Cẩm"></li>															
						</form>
					</ul>		
				</li>					
				<li>
					<a class="hover">Gà rán</a>
					<ul class="sub-menu">
						<form method="post" action="SP.php">
							<li><input class="tensp" name="tensp" type="submit" value="Đùi Gà Rán"></li>
							<li><input class="tensp" name="tensp" type="submit" value="Cánh Gà Rán"></li>								
							<li><input class="tensp" name="tensp" type="submit" value="Combo Đùi Và Cánh Gà Rán"></li>															
						</form>
					</ul>	
				</li>
				<li>
					<a class="hover">Pizza</a>
					<ul class="sub-menu">
						<form method="post" action="SP.php">
							<li><input class="tensp" name="tensp" type="submit" value="Pizza Hải Sản"></li>	
							<li><input class="tensp" name="tensp" type="submit" value="Pizza Thập Cẩm"></li>															
							<li><input class="tensp" name="tensp" type="submit" value="Pizza Thịt Nướng"></li>															
						</form>
					</ul>	
				</li>
				<li>
					<a class="hover">Nước Uống</a>
					<ul class="sub-menu">
						<form method="post" action="SP.php">
							<li><input class="tensp" name="tensp" type="submit" value="Trà Ổi Hồng"></li>
							<li><input class="tensp" name="tensp" type="submit" value="Trà Dâu Tằm"></li>
							<li><input class="tensp" name="tensp" type="submit" value="Trà Sữa Matcha"></li>
							<li><input class="tensp" name="tensp" type="submit" value="Trà Dứa Hạt Đát"></li>
							<li><input class="tensp" name="tensp" type="submit" value="Trà Sữa Truyền Thống"></li>																																										
						</form>
					</ul>	
				</li>
			</ul>
		</div>	
	</nav>
</div>

</body>
</html>
