<?php
session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Task</title>
<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<form name="fr" method="post">
<table width="1061" border="0" align="center" >
  <tr>
    <td align="center"><table width="1038" height="840" border="0">
      <tr>
        <td height="126"><div style="font-size:46px">Personal Information System</div>
        </td>
      </tr>
      <tr>
        <td height="100" align="center"><h2>Welcome </h2>
          
          <?php          


$m=new MongoClient();

$today = getdate();
$dt=$today['mday']."/".$today['mon']."/".$today['year'];

$query = $m->pim->task->find(array('startdate'=>$dt));
foreach ( $query as $current )
	{
 ?>
	<marquee>Todays Task :- <?php echo $current['title']."-".$current['desc'];?></marquee>	
<?php
}

?>
          <table width="760" border="1">
            <tr>
              <td width="190" align="center"><a href="Home.php"><div>Contacts</div></a></td>
              <td width="190" align="center"><a href="Tasks.php"><div>Tasks</div></a></td>
              <td width="190" align="center"><a href="Notes.php"><div>Notes</div></a></td>
              <td width="190" align="center"><a href="Appointments.php"><div>Appointmens</div></a></td>
              <td align="right"><a href="logout.php">logout</a></td>
            </tr>
          </table>
          <p>&nbsp;</p></td>
      </tr>
      <tr>
        <td height="606" align="center" valign="top"><table width="660" border="0">
          <tr>
            <td colspan="3" align="center">Enter StartDate To Search :-
              <select name="day" id="select">
              <?php for($i=1;$i<=31;$i++){ ?>
				  <option><?php echo $i; ?> </option>
                  <?php } ?>
              </select>
              <select name="month" id="select2">
              <?php for($i=1;$i<=12;$i++){ ?>
				  <option><?php echo $i; ?> </option>
                  <?php } ?>
              </select>
              <select name="year" id="select3">
              <?php for($i=2015;$i<=2025;$i++){ ?>
				  <option><?php echo $i; ?> </option>
                  <?php } ?>
              </select>
              <input type="submit" name="submit" id="submit" value="Search">
              <input type="submit" name="viewall" id="submit" value="View All">              
              </td>
          </tr>
          <tr>
            <td width="306" height="21" align="right"><a href="AddTask.php">Add Task</a></td>
            <td width="34" align="center">&nbsp;</td>
            <td width="306" align="left"><a href="DeleteTask.php">Delete Task</a></td>
          </tr>
        </table>
          <table width="901" border="0">
            <tr>
              <td colspan="5" align="center">Tasks</td>
              </tr>
            <tr>
              <td width="102" align="center">Task ID</td>
              <td width="176" align="center">Task Title</td>
              <td width="112" align="center">StartDate</td>
              <td width="99" align="center">EndDate</td>
              <td width="427" align="center">Description</td>
            </tr>
            <?php 
if(isset($_POST["submit"])){
$date=$_POST["day"]."/".$_POST["month"]."/".$_POST["year"];

$query = $m->pim->task->find(array('startdate'=> $date));
foreach ( $query as $current )
	{
?>
<tr align="center">
<?php
echo "<td>".$current["id"]."</td>";
echo "<td>".$current["title"]."</td>";
echo "<td>".$current["startdate"]."</td>";
echo "<td>".$current["enddate"]."</td>";
echo "<td>".$current["desc"]."</td>";
?>
</tr>
<?php
}
}


if(isset($_POST["viewall"])){

$query = $m->pim->task->find();
foreach ( $query as $current )
	{
?>
<tr align="center">
<?php
echo "<td>".$current["id"]."</td>";
echo "<td>".$current["title"]."</td>";
echo "<td>".$current["startdate"]."</td>";
echo "<td>".$current["enddate"]."</td>";
echo "<td>".$current["desc"]."</td>";
?>
</tr>
<?php
}
}

?>
</table>
          
          </td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
</body>
</html>
