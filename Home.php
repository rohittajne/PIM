<?php
session_start();
$user=$_SESSION["user_name"];
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome</title>
<link rel="stylesheet" href="stylesheet.css">
</head>

<body>
<form name="form" method="post">
<table width="1061" border="0" align="center" >
  <tr>
    <td height="501" align="center">
    <table width="1038"  border="0">
      <tr>
        <td height="126"><div style="font-size:46px">Personal Information System</div></td>
      </tr>
      <tr>
        <td height="100" align="center"><h2>Welcome </h2>
          <table width="760" border="1">
            <tr>
              <td width="190" align="center"><a href="Home.php"><div>Contacts</div></a></td>
              <td width="190" align="center"><a href="Tasks.php"><div>Tasks</div></a></td>
              <td width="190" align="center"><a href="Notes.php"><div>Notes</div></a></td>
              <td width="190" align="center"><a href="Appointments.php"><div>Appointmens</div></a></td>
              <td align="right"><a href="logout.php">logout</a></td>
            </tr>
          </table>
          
        </td>
      </tr>
      <tr>
        <td height="251" align="center" valign="top"><table width="660" border="0">
          <tr>
            <td colspan="3" align="center"><p>Enter Name To Search :-
              <input type="text" name="name" id="textfield"> 
              <input type="submit" name="submit" id="submit" value="Search">
              <input type="submit" name="viewall" id="submit" value="View All">
            
             </td>
          </tr>
          
          <tr>
            <td width="257" height="21" align="right"><a href="AddContact.php">Add Contact</a></td>
            <td width="132" align="center"><a href="Modify.php">Modify Contact</a></td>
            <td width="257" align="left"><a href="DeleteContact.php">Delete Contact</a></td>
          </tr>
        </table>
        
       
<?php 
$m=new MongoClient();

if(isset($_POST["submit"])){
$name=$_POST["name"];
?> 
          <table width="885" border="0" align="center">
          <tr>
            <td height="20" colspan="6" align="center"><h2>Contacts</h2></td>
            </tr>
          <tr>
            <td width="109" align="center">ID.</td>
            <td width="279" align="center">Name</td>
            <td width="120" align="center">Contact1</td>
            <td width="109" align="center">Contact2</td>
            <td width="120" align="center">Email</td>
            <td width="108" align="center">BirthDate</td>
          </tr>
        
  <?php       
$query = $m->pim->contact->find(array('name'=> $name));
foreach ( $query as $current )
{
?>
<tr align="center">
<?php
echo "<td>".$current["id"]."</td>";
echo "<td>".$current["name"]."</td>";
echo "<td>".$current["contact1"]."</td>";
echo "<td>".$current["contact2"]."</td>";
echo "<td>".$current["email"]."</td>";
echo "<td>".$current["dob"]."</td>";
?>
</tr>
<?php
}
}
if(isset($_POST["viewall"])){
?>
          <table width="885" border="0" align="center">
          <tr>
            <td height="20" colspan="6" align="center"><h2>Contacts</h2></td>
            </tr>
          <tr>
            <td width="109" align="center">ID.</td>
            <td width="279" align="center">Name</td>
            <td width="120" align="center">Contact1</td>
            <td width="109" align="center">Contact2</td>
            <td width="120" align="center">Email</td>
            <td width="108" align="center">BirthDate</td>
          </tr>

<?php
$query = $m->pim->contact->find();
foreach ( $query as $current )
	{
?>
<tr align="center">
<?php
echo "<td>".$current["id"]."</td>";
echo "<td>".$current["name"]."</td>";
echo "<td>".$current["contact1"]."</td>";
echo "<td>".$current["contact2"]."</td>";
echo "<td>".$current["email"]."</td>";
echo "<td>".$current["dob"]."</td>";
?></tr>
<?php
}
}

?>
         
         
         
         
         
         
         
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
</body>
</html>
