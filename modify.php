<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Modify Contact</title><link rel="stylesheet" href="stylesheet.css">
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
        <td height="100" align="center"><h2>Welcome </h2>
          <table width="760" border="1">
            <tr>
              <td width="190" align="center"><a href="Home.php"><div>Contacts</div></a></td>
              <td width="190" align="center"><a href="Tasks.php"><div>Tasks</div></a></td>
              <td width="190" align="center"><a href="Notes.php"><div>Notes</div></a></td>
              <td width="190" align="center"><a href="Appointments.php"><div>Appointmens</div></a></td>
            </tr>
          </table>
          <p>&nbsp;</p></td>
      </tr>
      <tr>
        <td height="251" align="center" valign="top"><table width="660" border="0">
          <tr>
            <td width="646" align="center"><p>Enter Name To update :-
                <input type="text" name="name" id="textfield"> 
              <input type="submit" name="submit" id="submit" value="update">
            </td>
            
            
<?php if(isset($_POST['submit'])){
	  $name=$_POST['name']; 
	  ?>
<script type="text/javascript">
	window.location="modifyContact.php?name=<?php echo $name;?>"
</script>

<?php } ?>

            
            
            
            
            
            
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
</body>
</html>
