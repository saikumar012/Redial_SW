<?php
include("session.php");
$sql="select s.*,p.* from `projects` p,`time` s where s.Pid like p.Pid";
$result=$database->query($sql);
echo "hello";
while($row=mysql_fetch_array($result))
{
$Pid=$row['Pid'];
$date4 =$row['deactive'];
$active=$row['active'];
$active1=strtotime('-6 day', $active);
echo $date1 = date("d/m/y - h:i A", $active1);
echo "</br>";
echo "</br>";
echo $date2 = date("d/m/y - h:i A", $active);
}
?>