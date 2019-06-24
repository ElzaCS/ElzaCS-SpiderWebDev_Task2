<!DOCTYPE html>
<html>
<head>
	<title>Wallet Manager</title>
	<link rel="stylesheet" href="login.css">
</head>
<body background="https://st.depositphotos.com/1596326/2653/v/950/depositphotos_26532107-stock-illustration-seamless-rich-floral-background.jpg">

<h1>Wallet Manager</h1>
	<!-- Button to open the modal login form -->
<button onclick="document.getElementById('id01').style.display='block'" style="height:27px;width:10%;align:'right';">Login</button>
	<!-- Button to open the modal login form -->
<button onclick="document.getElementById('id02').style.display='block'" style="height:27px;width:10%;right:'0px';">Sign up</button>

<br>
<article><h2>A little bit about me</h2>
<h3><p>Welcome to the wallet manager of Mr. Rohit Balaji, known as an Oracle enthusiast to many and as a Ladies man to many more.</p>
<p>This website helps keep track of Mr. Balaji's expenses as he is a very generous and honourable man who thus bring home a lot of bills.</p></h3></article>
<article><h2>A little bit about you</h2>
<h3><p>To settle any financial affairs, please feel free to mention them in your dashboard provided in your account by clicking the Login button.</p>
<p>If you do not have an account here, please create an account, so that Mr. Balaji is informed about your claims, by clicking the Sign up button<p></h3></article>

<!-- The Login Modal -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" 
class="close" title="Close Modal">&times;</span>

<form class="modal-content animate" action="http://proxy/login.php" method="post">
  <div class="imgcontainer">
    <img src="https://tse1.mm.bing.net/th?id=OIP.GqIjTJaOCVoVTD_TaIErnwHaIJ&pid=Api&P=0&w=300&h=300" alt="Avatar" class="avatar">
  </div>
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <br>
<?php
session_start();
   $rand=rand();
   $_SESSION['rand']=$rand;
  ?>
<input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
    <button type="submit" name="submitbtn" style="height:27px;width:100%;">Login</button>
    <br>
<p id="pd"></p>
  </div>

</form>
</div>

<!-- The Sign up Modal2 -->
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" 
class="close" title="Close Modal">&times;</span>
<form class="modal-content animate" action="http://proxy/addlogin.php" method="post">
  <div class="imgcontainer">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiJtBGGbC_GpE-XWFW3AT0h6Yph2XQlyNrRvBTyBnaBBJECG0T" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="Nuname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="Nuname" required>
    <br>
    <label for="Npsw1"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="Npsw1" required>
    <br>
<label for="Npsw2"><b>Confirm Password</b></label>
    <input type="password" placeholder="Re-Enter Password" name="Npsw2" required>
    <br>
    <button type="submit" style="height:27px;width:100%">Login</button>
    <br>
  </div>
</form>
</body>
</html>
