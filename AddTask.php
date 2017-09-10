<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Task</title>
<link rel="stylesheet" href="stylesheet.css">
</head>

<body>
<form name="f1" method="post">

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
              <td colspan="2" align="center"><h2>Add Task</h2></td>
              </tr>
            <tr>
              <td width="129">Task Title:-</td>
              <td width="214"><input type="text" name="title" id="textfield"></td>
            </tr>
            <tr>
              <td>Start Date:-</td>
              <td><select name="sday" id="select">
              <?php for($i=1;$i<=31;$i++){ ?>
				  <option><?php echo $i; ?> </option>
                  <?php } ?>
              </select>
                <select name="smonth" id="select2">
                <?php for($i=1;$i<=12;$i++){ ?>
				  <option><?php echo $i; ?> </option>
                  <?php } ?>
                </select>
                <select name="syear" id="select3">
                <?php for($i=2015;$i<=2025;$i++){ ?>
				  <option><?php echo $i; ?> </option>
                  <?php } ?>
                </select></td>
            </tr>
            <tr>
              <td>End Date:-:</td>
              <td><select name="eday" id="select4">
              <?php for($i=1;$i<=31;$i++){ ?>
				  <option><?php echo $i; ?> </option>
                  <?php } ?>
              </select>
                <select name="emonth" id="select5">
                <?php for($i=1;$i<=12;$i++){ ?>
				  <option><?php echo $i; ?> </option>
                  <?php } ?>
                </select>
                <select name="eyear" id="select6">
                <?php for($i=2015;$i<=2025;$i++){ ?>
				  <option><?php echo $i; ?> </option>
                  <?php } ?>
                </select></td>
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
$startdate=$_POST["sday"]."/".$_POST["smonth"]."/".$_POST["syear"];
$enddate=$_POST["eday"]."/".$_POST["emonth"]."/".$_POST["eyear"];
$desc=$_POST["desc"];
$today = getdate();
$id =$today['mday'].$today['hours']."".$today['minutes']."".$today['seconds'];

$m=new MongoClient();
$db=$m->pim;
$collection = $db->task;

$document = array(
"id" => "$id",
"title" => "$title",
"startdate" => "$startdate",
"enddate" => "$enddate",
"desc" => "$desc"
);

$collection->insert($document);
echo "Task Added.";
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
