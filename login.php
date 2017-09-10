<?php session_start(); ?>

	

   
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title><link rel="stylesheet" href="stylesheet.css">
</head>

<body>
<form name="form" method="post">
<table width="1061" border="0" align="center" >
  <tr>
    <td height="572" align="center"><table width="1038" height="570" border="0">
      <tr>
        <td height="126"><div style="font-size:46px">Personal Information System</div></td>
      </tr>
      <tr>
        <td><table width="766" border="1" align="right">
          <tr>
            <td align="center"><a href="index.php"><div>Home</div></a></td>
            <td align="center"><a href="login.php"><div>Login</div></a></td>
            <td align="center"><a href="Register.php"><div>Register</div></a></td>
            <td align="center"><a href="about.php"><div>About Us</div></a></td>
            <td align="center"><a href="contact.php"><div>Contact</div></a></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="405"><table width="358" height="197" border="0" align="center">
          <tr>
            <td height="43" colspan="2" align="center"><h1>Login</h1></td>
            </tr>
          <tr>
            <td width="125">User Name :- </td>
            <td width="217"><input name="mobile" type="text" autofocus required id="textfield" size="30"></td>
          </tr>
          <tr>
            <td>Password :-</td>
            <td><input name="pass" type="password" required id="password" size="30"></td>
          </tr>
          <tr>
            <td height="35" colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Login"></td>
<?php
           $m=new MongoClient();
$db=$m->pim;
$collection = $db->reg;

if(isset($_POST["submit"])){
	$user=$_POST["mobile"];
	$pass=$_POST["pass"];
	$query = $collection->find(array('mobile'=> $user));
	foreach($query as $doc)
	{	
	if($user==$doc['mobile'] && $pass==$doc['password'])
	{
		$_SESSION["user_id"]=$user;
		$_SESSION["user_name"]=$user;
	
	}
	else 
	{ 
	?>
	<script type="text/javascript">
		window.alert("Invalid LoginID or Password...");
	</script>
    <?php
	}
	}
}
		if(isset($_SESSION["user_name"])) 
		{
		?>
			<script type="text/javascript">
			window.location="Home.php?uid=<?php echo $_SESSION["user_name"];?>"
			</script> 
		<?php
		}
	
?>
        
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
</body>
</html>