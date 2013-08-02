<?php
 include("./include/db.php");
$user = strip_tags(trim($_REQUEST['username']));
 
if(strlen($user) <= 0)
{
  echo json_encode(array('code'  =>  -1,
  'result'  =>  'Invalid username, please try again.'
  ));
  die;
}
 
// Query database to check if the username is available
$query = "Select * from propertytype where type = '$user' ";
// Execute the above query using your own script and if it return you the
// result (row) we should return negative, else a success message.
 $available1=mysql_query($query,$con);
 $available=mysql_fetch_array($available1);
 if($available)
{
  echo json_encode(array('code'  =>  1,
  'result'  =>  "$user already added"
  ));
  die;
}
else
{
  echo  json_encode(array('code'  =>  0,
  'result'  =>  "$user not added."
  ));
  die;
}
die;
?>