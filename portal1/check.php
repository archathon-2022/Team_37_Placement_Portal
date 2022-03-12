<form method="get">
<?php
$conn = mysqli_connect("localhost", "root", "","placementDB");

$sql = "SELECT password from users where username='".$_POST["uname"]."'";
$un=$_POST["uname"];

$retval = mysqli_query( $conn, $sql  );

while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) 
{
	if ($row['password']==$_POST["pwd"])
	{
      echo "login successful<br> ";
	  session_start();
	  $_SESSION['username']=$un;
	  if ($_POST['usertype']=="S")
			header('refresh:0;url=http://localhost/portal1/studash.php?uname='.$un);
	  elseif($_POST['usertype']=="A")
			header('refresh:0;url=http://localhost/portal1/admdash.php?uname='.$un);
	  elseif($_POST['usertype']=="C")
	  		header('refresh:0;url=http://localhost/portal1/comdash.php?uname='.$un);
	 }
	else
	{
		echo "<script>alert('username or password incorrect');</script>";
		if ($_POST['usertype']=="S")
				header('refresh:0;url=http://localhost/portal1/stulogin.php');
	  else
			header('refresh:0;url=http://localhost/portal1/adminlogin.php');
	}
   } 
   
   mysqli_close($conn);
?>
</form>
