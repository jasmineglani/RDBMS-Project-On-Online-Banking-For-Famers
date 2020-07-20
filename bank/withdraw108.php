<<!DOCTYPE html>
<html>
<head>
	<title>Withdraw 108</title>
</head>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color:#ffe4c4;
  padding: 20px;
}
</style>
<body >
<h2> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbspWithdraw 108 Account</h2>
<div class="container">
<form method="POST" method="GET">

<h3>ACCOUNT INFORMATION</h3>
<label>ACCOUNT NUMBER</label>
<input type="text" name="i" required="required"><br></input>
<label>WITHDRAW AMOUNT</label>
<input type="number" name="b" required="required"><br></input>
<input type ="submit" name="add" value="insert"></input>
</form>
</div>
<?php
include('dbcon.php');

if(isset($_POST["add"]))
{


	$a = $_POST['i'];
	$b = $_POST['b'];
	$sql=mysqli_query($con,"SELECT * FROM `account108` WHERE acc108no='$a'");
$res=mysqli_fetch_array($sql);
$ii=$res['balance108'];
if($ii>$b)
{
	$ll=$ii-$b;
     $qry=mysqli_query($con,"INSERT INTO `withdraw108`( `w108amt`, `acc108no`) VALUES('$b','$a')") or die(mysqli_error($con));
	$qry1=mysqli_query($con,"UPDATE `account108`SET `balance108`='$ll'WHERE acc108no='$a'")or die(mysqli_error($con));
	if($qry==true)
	{
		echo"withdrawed";
	}
	else
	{
		echo "failed";
	}
}
else
{
  echo "insufficient balance";
}
}
?>
</body>
</html>
