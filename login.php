<html>
<head><title>hlo</title><link rel="stylesheet" href="login.css"></head>
<body background="https://st.depositphotos.com/1596326/2653/v/950/depositphotos_26532107-stock-illustration-seamless-rich-floral-background.jpg">
<button onclick="document.getElementById('id03').style.display='block'" style="height:27px;width:10%;float:right;">Sign out</button>
<!--sign out-->
<div id="id03" class="modal">
  <span onclick="document.getElementById('id03').style.display='none'" 
class="close" title="Close Modal">&times;</span>
"<form class="modal-content animate" action="http://proxy/wall.php" method="post">
    <div class="container">
    <label for="uname"><b>Are you sure you want to sign out?</b></label>
    <br>
    <button type="submit" style="height:27px;width:100%;">Yes</button>
  </div>
  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn" style="right: 0px;">Cancel</button>
  </div>
</form>
</div>
<!--sign out over--->

<p><h1>Welcome to your dashboard</h1></p>
 <div class="container" style="width:75%;">
    <img src="finance.jpg" alt="Avatar" class="avatar" style="width:25%;align:left;float:right;">
 <h3>Enter your finances here:</h3>
  <table width='700px' class="tabid" style="position:relative;top: -20px; padding:0;">
   <form class="newstuff" action="http://proxy/login.php" method="post" style="text-align: left;"> 
    <tr><td><label for="nam"><b>Name</b></label></td>
         <td><input type="text" placeholder="Name of expense" name="nam" style="width:100%;" required></td></tr>
    <tr><td><label for="des"><b>Description</b></label></td>
    <td><input type="text" placeholder="Describe the expense" name="des" style="width:100%;" required></td></tr>
     <tr><td><label for="amt"><b>Amount</b></label></td>
    <td><input type="text" placeholder="Enter amount" name="amt" style="width:100%;" required></td></tr>

    <tr><td><button type="submit" name="submitbtn" style="height:27px;width:100%">Enter</button></td></tr>
</form>
  </table>
  </div>

<?php
$servername = "localhost";
$username = "root";
$password = "redhat";
$dbname = "wallDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Start Session
session_start();

if(isset($_POST['submitbtn'])) {
 $sql1 = "select * from myUsers where name='".$_POST['uname']."';";
 $result1 = mysqli_query($conn,$sql1);
 $row1 = mysqli_fetch_array($result1) ;

 //First Login
  if (hash('ripemd160', $_POST['psw'])==$row1['password'] && $_POST['psw']!=null) {  
     //save username
     $_SESSION['user']=$_POST['uname'];

    // enter unique no. to table
    $sup="update myUsers set uniqueID=".$_SESSION['rand']." where name='".$_POST['uname']."';";
    if ($conn->query($sup) === FALSE) {  echo "<br>shocking: ".$sup."<br>";   }
  }
  else  {
    //refreshing or updating
    $sql2 = "select * from myUsers where name='".$_SESSION['user']."';";
    $result2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_array($result2) ;
    if ($row2['uniqueID']==$_SESSION['rand']) { 
  
     //add to user's table
      $sqlup="insert into trans (user,uniqueID,date,ex_name,ex_desc,ex_amt) values ('".$_SESSION['user']."',".$_SESSION['rand'].",NOW(),'".$_POST['nam']."','".$_POST['des']."',".$_POST['amt'].");";
      if ($conn->query($sqlup) === FALSE) {  echo "<br>shocking: ".$sqlup."<br>";   }
    }
    else  {
      // wrong name/password-redirect back after 1 sec
	sleep(1);
	header('Location: http://proxy/wall.php');
    }
  }
}
// print user's table
echo "<center><h3>Current Finances:</h3>";
$sqlget = "select * from trans where user='".$_SESSION['user']."';";
 $result = mysqli_query($conn, $sqlget);
 echo "<table border='1' bgcolor='#ccffcc'>";
 echo "<tr><th>ID</th><th>Date</th><th>Name</th><th>Description</th><th>Amount</th></tr>";
 $i=1;
 while($row =mysqli_fetch_array($result, MYSQLI_ASSOC)) {
 	echo "<tr><td>";
	echo $i;	
        echo "</td><td>";
	echo $row['date'];
	echo "</td><td>";
	echo $row['ex_name'];
	echo "</td><td>";
	echo $row['ex_desc'];
	echo "</td><td>";
	echo $row['ex_amt'];
	echo "</td></tr>";
     $i+=1;
 }
 echo "</table>";	
 //print total
$sqlsum="select sum(ex_amt) from trans where user='".$_SESSION['user']."';";
$result = mysqli_query($conn, $sqlsum);
$row =mysqli_fetch_array($result, MYSQLI_ASSOC);
echo "<h3>Total=".$row['sum(ex_amt)']."</h3>";
echo "</center>";

?>
</body>
</html>
