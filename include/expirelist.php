<?php
class Expirelist
{

function expirelist()
{
global $database;
global $message;
global $mailer;
//////////////////////////////////////////////////////////////////////
//////////////////common projects   //////////////////////////////////
/////////////////////////////////////////////////////////////////////// 


$sql="select s.*,p.* from `projects` p,`time` s where s.Pid like p.Pid";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
$Pid=$row['Pid'];
$date4 =$row['deactive'];
$phone = $row['Phone'];
$email = $row['Email'];
//echo strtotime('yy-mm-dd',$date4);
$msgdate7=strtotime('-7 days',$date4);
$msgdate3=strtotime('-3 days',$date4);
$msgdate1=strtotime('-1 days',$date4);
$today = time();
$del=time();
//echo $date4-$today;
//to check sending message and mail before one week prior to deactivated
$msgquery = "select * from msg_projects where Pid = '$Pid'";
$msgrows = mysql_query($msgquery);
if(mysql_num_rows($msgrows) == 0){
if($msgdate7-$today<0){
$msgquery0 = "INSERT INTO `msg_projects`(`id`, `Week`, `three`, `today`, `Pid`) VALUES ('',1,0,0,'$Pid')";
mysql_query($msgquery0);
//echo $msgquery0;
$matter = "Hello ".$row['Name']." Your Property ".$row['Pid']." will be deactivated in one week. Contact Redial 04022222244";
//echo "4 minutes";
}
}else{
$msgrow = mysql_fetch_array($msgrows);
	if($msgrow['three'] == 0){
		if($msgdate3-$today<0){
			$msgqueryupdate = "UPDATE `msg_projects` SET `three`=1 WHERE Pid = '$Pid'";
			mysql_query($msgqueryupdate);
			$matter = "Hello ".$row['Name']." Your Property ".$row['Pid']." will be deactivated three days. Contact Redial 04022222244";
			$mailsubject = "REDIAL-Property Deactivate";
//			echo "3 minutes";
		}
	}else if($msgrow['today'] == 0){
		if($msgdate1-$today<0){
			$msgqueryupdate = "UPDATE `msg_projects` SET `today`=1 WHERE Pid = '$Pid'";
			mysql_query($msgqueryupdate);
			$matter = "Hello ".$row['Name']." Your Property ".$row['Pid']." will be deactivated one day. Contact Redial 04022222244";
			$mailsubject = "REDIAL-Property Deactivate";
//			echo "1 minutes";
		}
	}
}
if (($date4-$today)<0){
//echo "deactivated";
    $sql="INSERT INTO `del_projects`(`id`, `Type`, `Require`, `Area`, `AreaType`, `Price`, `PriceType`, `City`, `Location`, `Description`, `Name`, `Phone`, `Email`, `Ownership`, `Verify`, `Ptype`, `Date`, `ProjectType`, `Pid`, `SMS`) SELECT `id`, `Type`, `Require`, `Area`, `AreaType`, `Price`, `PriceType`, `City`, `Location`, `Description`, `Name`, `Phone`, `Email`, `Ownership`, `Verify`, `Ptype`, `Date`, `ProjectType`, `Pid`, `SMS` FROM `projects` WHERE Pid='".$Pid."'";
	mysql_query($sql);
	$query="DELETE FROM `projects` WHERE `Pid`='".$Pid."'";
    mysql_query($query);
	$matter = "Hello ".$row['Name']." Your Property ".$row['Pid']." has been deactivated. Contact Redial 04022222244";
	$mailsubject = "REDIAL-Property Deactivate";
 } 
	$message->sendMessage($phone,$matter);
	$mailer->sendMailWithSub($mailsubject,$matter,$email);
}
//////////////////////////////////////////////////////////////////////
//////////////////      agents       //////////////////////////////////
///////////////////////////////////////////////////////////////////////
$sql="select s.*,p.* from agents p,time s where s.Pid=p.AgentID";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
$date4 =$row['deactive'];
$today = time();
$Pid=$row['AgentID'];

if(($date4-$today)<0)
{
$sql="INSERT INTO `del_agents`(`id`, `Require`, `DCity`, `Type`, `City`, `Location`, `Description`, `Name`, `Mobile`, `Email`, `Active`, `Date`, `AgentID`, `ptype`, `SMS`) SELECT `id`, `Require`, `DCity`, `Type`, `City`, `Location`, `Description`, `Name`, `Mobile`, `Email`, `Active`, `Date`, `AgentID`, `ptype`, `SMS` FROM `agents` WHERE AgentID='".$Pid."'";
mysql_query($sql);
$query="delete from agents where `AgentID`='".$Pid."'";
mysql_query($query);
}
}
$sql="select s.*,p.* from buyers p,time s where s.Pid=p.Buyerid";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
$date4 =$row['deactive'];
$today = time();
$Pid=$row['Buyerid'];
if(($date4-$today)<0)
{
$sql="INSERT INTO `del_buyers`(`id`, `Type`, `Area`, `AreaType`, `Price`, `PriceType`, `City`, `Location`, `Description`, `Name`, `Phone`, `Email`, `Verify`, `Date`, `ProjectType`, `Buyerid`, `SMS`) SELECT `id`, `Type`, `Area`, `AreaType`, `Price`, `PriceType`, `City`, `Location`, `Description`, `Name`, `Phone`, `Email`, `Verify`, `Date`, `ProjectType`, `Buyerid`, `SMS` FROM `buyers` WHERE Buyerid='".$Pid."'";
mysql_query($sql);
$query="delete from buyers where `Buyerid`='".$Pid."'";
mysql_query($query);
}
}
//////////////////////////////////////////////////////////////////////
//////////////////gated community projects   /////////////////////////
///////////////////////////////////////////////////////////////////////
$sql="select s.*,p.* from gc_projects p,time s where s.Pid=p.Pid";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
$date4 =$row['deactive'];
$today = time();
$Pid=$row['Pid'];

$msgquery = "select * from msg_projects where Pid = '$Pid'";
$msgrows = mysql_query($msgquery);
if(mysql_num_rows($msgrows) == 0){
if($msgdate7-$today<0){
$msgquery0 = "INSERT INTO `msg_projects`(`id`, `Week`, `three`, `today`, `Pid`) VALUES ('',1,0,0,'$Pid')";
mysql_query($msgquery0);
//echo $msgquery0;
$matter = "Hello ".$row['Name']." Your Property ".$row['Pid']." will be deactivated in one week. Contact Redial 04022222244";
//echo "4 minutes";
}
}else{
$msgrow = mysql_fetch_array($msgrows);
	if($msgrow['three'] == 0){
		if($msgdate3-$today<0){
			$msgqueryupdate = "UPDATE `msg_projects` SET `three`=1 WHERE Pid = '$Pid'";
			mysql_query($msgqueryupdate);
			$matter = "Hello ".$row['Name']." Your Property ".$row['Pid']." will be deactivated three days. Contact Redial 04022222244";
			$mailsubject = "REDIAL-Property Deactivate";
//			echo "3 minutes";
		}
	}else if($msgrow['today'] == 0){
		if($msgdate1-$today<0){
			$msgqueryupdate = "UPDATE `msg_projects` SET `today`=1 WHERE Pid = '$Pid'";
			mysql_query($msgqueryupdate);
			$matter = "Hello ".$row['Name']." Your Property ".$row['Pid']." will be deactivated one day. Contact Redial 04022222244";
			$mailsubject = "REDIAL-Property Deactivate";
//			echo "1 minutes";
		}
	}
}

if(($date4-$today)<0)
{
$sql = "UPDATE `gc_projects` set Verif='4' where WHERE Pid='".$Pid."'";
//$sql="INSERT INTO `del_gc_projects`(`id`, `Type`, `Require`, `Area`, `AreaType`, `City`, `Location`, `Description`, `Name`, `Phone`, `Email`, `Ownership`, `Verify`, `rctype`, `Date`, `Pid`, `SMS`, `pname`) SELECT `id`, `Type`, `Require`, `Area`, `AreaType`, `City`, `Location`, `Description`, `Name`, `Phone`, `Email`, `Ownership`, `Verify`, `rctype`, `Date`, `Pid`, `SMS`, `pname` FROM `gc_projects` WHERE Pid='".$Pid."'";
mysql_query($sql);
//$query="delete from gc_projects where `Pid`='".$Pid."'";
//mysql_query($query);
}
}
//////////////////////////////////////////////////////////////////////
//////////////////gated community properties   /////////////////////////
///////////////////////////////////////////////////////////////////////
$sql="select s.*,p.* from gc_properties p,time s where s.Pid=p.Pid";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
$date4 =$row['deactive'];
$today = time();
$Pid=$row['Pid'];

$msgquery = "select * from msg_projects where Pid = '$Pid'";
$msgrows = mysql_query($msgquery);
if(mysql_num_rows($msgrows) == 0){
if($msgdate7-$today<0){
$msgquery0 = "INSERT INTO `msg_projects`(`id`, `Week`, `three`, `today`, `Pid`) VALUES ('',1,0,0,'$Pid')";
mysql_query($msgquery0);
//echo $msgquery0;
$matter = "Hello ".$row['Name']." Your Property ".$row['Pid']." will be deactivated in one week. Contact Redial 04022222244";
//echo "4 minutes";
}
}else{
$msgrow = mysql_fetch_array($msgrows);
	if($msgrow['three'] == 0){
		if($msgdate3-$today<0){
			$msgqueryupdate = "UPDATE `msg_projects` SET `three`=1 WHERE Pid = '$Pid'";
			mysql_query($msgqueryupdate);
			$matter = "Hello ".$row['Name']." Your Property ".$row['Pid']." will be deactivated three days. Contact Redial 04022222244";
			$mailsubject = "REDIAL-Property Deactivate";
//echo "3 minutes";
		}
	}else if($msgrow['today'] == 0){
		if($msgdate1-$today<0){
			$msgqueryupdate = "UPDATE `msg_projects` SET `today`=1 WHERE Pid = '$Pid'";
			mysql_query($msgqueryupdate);
			$matter = "Hello ".$row['Name']." Your Property ".$row['Pid']." will be deactivated one day. Contact Redial 04022222244";
			$mailsubject = "REDIAL-Property Deactivate";
//echo "1 minutes";
		}
	}
}

if(($date4-$today)<0)
{
$sql = "UPDATE `gc_properties` set Verif = '4' where `Pid`='".$Pid."'";
//$sql="INSERT INTO `del_gc_properties`(`id`, `Type`, `Require`, `PName`, `Area`, `AreaType`, `Price`, `PType`, `City`, `Location`, `Description`, `Name`, `Phone`, `Email`, `AreYou`, `Pid`, `Date`, `Verify`, `SMS`, `rctype`)  SELECT `id`, `Type`, `Require`, `PName`, `Area`, `AreaType`, `Price`, `PType`, `City`, `Location`, `Description`, `Name`, `Phone`, `Email`, `AreYou`, `Pid`, `Date`, `Verify`, `SMS`, `rctype` FROM `gc_properties` WHERE Pid='".$Pid."'";
mysql_query($sql);
//$query="delete from gc_properties where `Pid`='".$Pid."'";
//mysql_query($query);
}
}
}
};
$expire=new Expirelist;
?>