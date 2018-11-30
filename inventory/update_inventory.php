<?php
//fetch.php;
if(isset($_POST["view"]))
{
 include("connect.php");
 if($_POST["view"] != '')
 {
	// "UPDATE invetory SET prodq= prodq-$quantity where prodid=$prodid";
  $update_query = "UPDATE inventory SET comment_status=1 WHERE comment_status=0";
  mysqli_query($connect, $update_query);
 }

$query = "SELECT * FROM inventory WHERE prodq<5";
 $result = mysqli_query($connect, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <li>
    <a href="#">
     <strong>'. $row["prodname"].'</strong><br />
     <small><em>'.$row["prodq"].'</em></small>
    </a>
   </li>
   <li class="divider"></li>
   ';
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 
 $query_1 = "SELECT * FROM `inventory` WHERE comment_status=0 and prodq<5";
 $result_1 = mysqli_query($connect, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>
