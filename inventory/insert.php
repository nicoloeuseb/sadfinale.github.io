<?php
//insert.php
if(isset($_POST["subject"]))
{
 include("connect.php");
 $subject = mysqli_real_escape_string($connect, $_POST["subject"]);
 $comment = mysqli_real_escape_string($connect, $_POST["comment"]);
  $num = mysqli_real_escape_string($connect, $_POST["num"]);
 $query = "
 INSERT INTO inventory(prodname, uprice, prodq)
 VALUES ('$subject', '$comment','$num')
 ";
 mysqli_query($connect, $query);
}
?>
