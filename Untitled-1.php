<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>



<body>
<form method="post">
<input type="submit" name="submit" id="submit" value="Submit">
<?php
if(isset($_POST["submit"])){

?>
<script type="text/javascript">
		window.alert("Invalid LoginID or Password...");
	</script>
  <?php
}
?></form>

</body>
</html>
