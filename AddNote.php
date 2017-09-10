<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Note</title>
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
              <td colspan="2" align="center"><h2>Add Note</h2></td>
            </tr>
            <tr>
              <td width="129">Note Title:-</td>
              <td width="214"><input type="text" name="title" id="textfield"></td>
            </tr>
            <tr>
              <td>Descriptionn</td>
              <td><textarea name="desc" id="textarea"></textarea></td>
            </tr>
            <tr>
              <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Add"></td>
              
              
                                       <?php
  if(isset($_POST["submit"]))
{
$title=$_POST["title"];
$desc=$_POST["desc"];
$today = getdate();
$id =$today['mday'].$today['hours']."".$today['minutes']."".$today['seconds'];
$m=new MongoClient();
$db=$m->pim;
$collection = $db->note;
$d=date(d)."/".date(m)."/".date(Y);

$document = array(
"id" => "$id", 
"date"=>"$d",
"title" => "$title",
"desc" => "$desc"
);

$collection->insert($document);
echo "Note Added.";
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
