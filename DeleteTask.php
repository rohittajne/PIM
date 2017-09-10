<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Task</title>
<link rel="stylesheet" href="stylesheet.css">
</head>

<body>
<form name="fr" method="post">
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
          <table width="479" height="52" border="0">
            <tr>
              <td align="center">Enter Task ID to Delete Contact :-
                <input type="text" name="id" id="textfield"></td>
            </tr>
            <tr>
              <td align="center"><input type="submit" name="submit" id="submit" value="Delete"></td>
              
              
<?php 
if(isset($_POST['submit'])){
$id=$_POST['id'];
	  
$m=new MongoClient();
try{
$db=$m->pim;
$collection = $db->task;

$arr=array( 'id'=>$id);

$r=$collection->remove($arr);

echo "<br /><br />Record Deleted...";
$m->close();
}

catch(MongoException $m)
{
echo $m;
exit;
}
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
