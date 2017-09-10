<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register User</title><link rel="stylesheet" href="stylesheet.css">
</head>

<body>
<form name="form" method="post">
<table width="1061" border="0" align="center" >
  <tr>
    <td height="607" align="center"><table width="1038" height="605" border="0">
      <tr>
        <td height="126"><div style="font-size:46px">Personal Information System</div>
        
      
        </td>
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
        <td height="440"><table width="354" height="420" border="0" align="center">
          <tr>
            <td colspan="2" align="center"><h1>Register User</h1></td>
            </tr>
          <tr>
            <td width="143">Name :-</td>
            <td width="195"><input type="text" name="name" id="textfield"></td>
          </tr>
          <tr>
            <td>Mobile:-</td>
            <td><input type="text" name="mobile" id="textfield3"></td>
          </tr>
          <tr>
            <td>Address:-</td>
            <td><textarea name="address" id="textarea"></textarea></td>
          </tr>
          <tr>
            <td>Birth Date:-</td>
            <td><input type="text" name="dob" id="textfield4"></td>
          </tr>
          <tr>
            <td>Email :-</td>
            <td><input type="text" name="email" id="textfield5"></td>
          </tr>
          <tr>
            <td>Password :-</td>
            <td><input type="password" name="password" id="password"></td>
          </tr>
          <tr>
            <td>Confirm password :-</td>
            <td><input type="password" name="password2" id="password2"></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Register"></td>
           
           
           
           <?php
  if(isset($_POST["submit"]))
{
$name=$_POST["name"];
$add=$_POST["address"];
$con=$_POST["mobile"];
$pass=$_POST["password"];
$dob=$_POST["dob"];
$email=$_POST["email"];
$m=new MongoClient();
$db=$m->pim;
$collection = $db->reg;

$document = array( 
"name" => "$name",
"mobile" => "$con",
"address" => "$add", 
"password" => "$pass",
"dob" => "$dob",
"email" => "$email"
);

$collection->insert($document);
echo "Account Created.";
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
