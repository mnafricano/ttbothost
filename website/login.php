<?php
//include("index.html");
include("config.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from Form 
$myusername=addslashes($_POST['user']); 
$mypassword=addslashes($_POST['pass']); 

$sql="SELECT id FROM admin WHERE username='$myusername' and passcode='$mypassword'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$active=$row['active'];
$count=mysql_num_rows($result);


// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{
//session_register("myusername"); no longer needed...
$_SESSION['login_user']=$myusername;

header("location: main.php");
}
else 
{
$error="<b>Your Login Name or Password is invalid</b>";
echo($error);
}
}


?>