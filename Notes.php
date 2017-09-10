<?php
session_start();
$user=$_SESSION["user_name"];
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Notes</title>
<link rel="stylesheet" href="stylesheet.css">
</head>

<body>
<form name="fr" method="post">
<table width="1061" border="0" align="center" >
  <tr>
    <td align="center"><table width="1038" height="840" border="0">
      <tr>
        <td height="126"><div style="font-size:46px">Personal Information Manager</div>
       
        </td>
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
          <p>&nbsp;</p></td>
      </tr>
      <tr>
        <td height="606" align="center" valign="top"><table width="660" border="0">
          <tr>
            <td colspan="3" align="center">Enter Date To Search :-
              <select name="day" id="select">
          <option>01</option>
              <option>02</option>
              <option>03</option>
              <option>04</option>
              <option>05</option>
              <option>06</option>
              <option>07</option>
              <option>08</option>
              <option>09</option>
			  <?php for($i=10;$i<=31;$i++){ ?>
				  <option><?php echo $i; ?> </option>
                  <?php } ?>
              </select>
              <select name="month" id="select2">
              <option>01</option>
              <option>02</option>
              <option>03</option>
              <option>04</option>
              <option>05</option>
              <option>06</option>
              <option>07</option>
              <option>08</option>
              <option>09</option>
              <option>10</option>
              <option>11</option>
              <option>12</option>
              </select>
              <select name="year" id="select3">
              <?php for($i=2015;$i<=2025;$i++){ ?>
				  <option><?php echo $i; ?> </option>
                  <?php } ?>
              </select>
              <input type="submit" name="search" id="submit" value="Search">
              <input type="submit" name="viewall" id="submit" value="View All">
              </td>
          </tr>
          <tr>
            <td width="306" height="21" align="right"><a href="AddNote.php">Add Note</a></td>
            <td width="34" align="center">&nbsp;</td>
            <td width="306" align="left"><a href="DeleteNote.php">Delete Note</a></td>
          </tr>
        </table>
          <table width="893" border="0">
            <tr>
              <td colspan="4" align="center">Notes</td>
            </tr>
            <tr>
              <td width="113" align="center">Note ID</td>
              <td width="111" align="center">Date</td>
              <td width="137" align="center">Note Title</td>
              <td width="532" align="center">Description</td>
            </tr>
         
           
             <?php 
$m=new MongoClient();

if(isset($_POST["search"])){
$date=$_POST["day"]."/".$_POST["month"]."/".$_POST["year"];

$query = $m->pim->note->find(array('date'=>$date));
foreach ($query as $current )
	{
?>
<tr align="center">
<?php
echo "<td>".$current["id"]."</td>";
echo "<td>".$current["date"]."</td>";
echo "<td>".$current["title"]."</td>";
echo "<td>".$current["desc"]."</td>";
?></tr>
<?php
}
}

if(isset($_POST["viewall"])){

$query = $m->pim->note->find();
foreach ( $query as $current )
{
?>
<tr align="center">
<?php
echo "<td>".$current["id"]."</td>";
echo "<td>".$current["date"]."</td>";
echo "<td>".$current["title"]."</td>";
echo "<td>".$current["desc"]."</td>";
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
