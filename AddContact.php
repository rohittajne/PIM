<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Contact</title>
<link rel="stylesheet" href="stylesheet.css">
</head>

<body>
<form name="form" method="post">
<table width="1061" border="0" align="center" >
  <tr>
    <td height="501" align="center">
    <table width="1038"  border="0">
      <tr>
        <td height="126"><div style="font-size:46px">Personal Information System</div>
</td>
      </tr>
      <tr>
        <td align="center"><h2>Welcome </h2>
          <table width="760" border="1">
            <tr>
              <td width="190" align="center"><div><a href="Home.php">Contacts</a></div></td>
              <td width="190" align="center"><div><a href="Tasks.php">Tasks</a></div></td>
              <td width="190" align="center"><div><a href="Notes.php">Notes</a></div></td>
              <td width="190" align="center"><div><a href="Appointments.php">Appointmens</a></div></td>
            </tr>
          </table>
          <p>&nbsp;</p>
          <table width="359" height="212" border="0">
            <tr>
              <td colspan="2" align="center"><h2>Add Contact</h2></td>
              </tr>
            <tr>
              <td width="129">Name :-</td>
              <td width="214"><input type="text" name="name" id="textfield"></td>
            </tr>
            <tr>
              <td>Contact No1:-</td>
              <td><input type="text" name="contact1" id="textfield2"></td>
            </tr>
            <tr>
              <td>Contact No2:</td>
              <td><input type="text" name="contact2" id="textfield3"></td>
            </tr>
            <tr>
              <td>Email:-</td>
              <td><input type="text" name="email" id="textfield4"></td>
            </tr>
            <tr>
              <td>BirthDate:-</td>
              <td><input type="text" name="dob" id="textfield5"></td>
            </tr>
            <tr>
              <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Add"></td>
                
              
              
              
              
              
<?php
  if(isset($_POST["submit"]))
{
$name=$_POST["name"];
$con1=$_POST["contact1"];
$con2=$_POST["contact2"];
$dob=$_POST["dob"];
$email=$_POST["email"];
$today = getdate();
$id =$today['mday'].$today['hours']."".$today['minutes']."".$today['seconds'];
$m=new MongoClient();
$db=$m->pim;
$collection = $db->contact;

$document = array( 
"id" => "$id",
"name" => "$name",
"contact1" => "$con1",
"contact2" => "$con2",
"dob" => "$dob",
"email" => "$email"
);

$collection->insert($document);
echo "Contact Added.";
} 

?>            
              
              </tr>
          </table>
          <p>&nbsp;</p>
          <p>&nbsp;</p></td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
</body>
</html>
