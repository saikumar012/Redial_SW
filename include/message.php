<?php 
class Message
{
   /**
    * sendWelcome - Sends a welcome message to the newly
    * registered user, also supplying the username and
    * password.
    */
function sendMessage($phone, $message){
   
   //Please Enter Your Details
 $user="redial456"; //your username
 $password="6home9"; //your password
 $mobilenumbers="91".$phone; //enter Mobile numbers comma seperated
 $message = $message; //enter Your Message 
 $senderid="Test"; //Your senderid
 $messagetype="N"; //Type Of Your Message
 //$DReports="Y"; //Delivery Reports
$url="http://www.smscountry.com/SMSCwebservice_Bulk.aspx?";
 //domain name: Domain name Replace With Your Domain  
 $message = urlencode($message);
 $ch = curl_init(); 
 if (!$ch){die("Couldn't initialize a cURL handle");}
 $ret = curl_setopt($ch, CURLOPT_URL,$url);
 curl_setopt ($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);          
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
 curl_setopt ($ch, CURLOPT_POSTFIELDS, 
"User=$user&passwd=$password&mobilenumber=$mobilenumbers&message=$message&sid=$senderid&mtype=$messagetype");
 $ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


//If you are behind proxy then please uncomment below line and provide your proxy ip with port.
// $ret = curl_setopt($ch, CURLOPT_PROXY, "PROXY IP ADDRESS:PORT");



 $curlresponse = curl_exec($ch); // execute
if(curl_errno($ch))
	echo 'curl error : '. curl_error($ch);

 if (empty($ret)) {
    // some kind of an error happened
    die(curl_error($ch));
    curl_close($ch); // close cURL handler
 } else {
    $info = curl_getinfo($ch);
    curl_close($ch); // close cURL handler
    //echo "<br>";
	return $curlresponse;    //echo "Message Sent Succesfully" ;
		//return false;
 	}
 //return mail($email,$subject,$body,$from);
   }
function sendEnquired($phone,$ids,$tbl){
global $database;
	$id = explode(',',$ids);
	$len = sizeof($id);
	if($tbl == "pro"){
		for($i=0; $i<$len-1; $i++){
		$rid = $id[$i];
		$q = "SELECT Name,Phone,Pid FROM projects where id ='$rid'";
		$enqresult = $database->query($q);
		$enqrow = mysql_fetch_array($enqresult);
		$message = "Dear ".$enqrow['Name'].", One person has enquired about your Property ".$enqrow['Pid']." You can contact him back on this no.".$phone.".";
		$this->sendMessage($enqrow['Phone'],$message);
		}
	}
	if($tbl == "ag"){
		for($i=0; $i<$len-1; $i++){
		$rid = $id[$i];
		$q = "SELECT Name,Mobile,AgentID FROM agents where id ='$rid'";
		$enqresult = $database->query($q);
		$enqrow = mysql_fetch_array($enqresult);
		$message = "Dear ".$enqrow['Name'].", One person has enquired about you ".$enqrow['AgentID']." for agents. You can contact him back on this no.".$phone.".";
		$this->sendMessage($enqrow['Mobile'],$message);
		}
	}
	if($tbl == "by"){
		for($i=0; $i<$len-1; $i++){
		$rid = $id[$i];
		$q = "SELECT Name,Phone,Buyerid FROM buyers where id ='$rid'";
		$enqresult = $database->query($q);
		$enqrow = mysql_fetch_array($enqresult);
		$message = "Dear ".$enqrow['Name'].", One person has enquired about you ".$enqrow['Buyerid']." for Buyer. You can contact him back on this no.".$phone.".";
		$this->sendMessage($enqrow['Phone'],$message);
		}
	}
	if($tbl == "gcpro"){
	for($i=0; $i<$len-1; $i++){
		$rid = $id[$i];
		$q = "SELECT Name,Phone,PName,Pid FROM gc_properties where id ='$rid'";
		$enqresult = $database->query($q);
		$enqrow = mysql_fetch_array($enqresult);
		$message = "Dear ".$enqrow['Name'].", One person has enquired about your Property ".$enqrow['Pid']." for Properties in ".$enqrow['PName'].". You can contact him back on this no.".$phone.".";
		$this->sendMessage($enqrow['Phone'],$message);
		}
	}
	if($tbl == "gcpjc"){
	for($i=0; $i<$len-1; $i++){
		$rid = $id[$i];
		$q = "SELECT Name,Phone,pname,Pid FROM gc_projects where id ='$rid'";
		$enqresult = $database->query($q);
		$enqrow = mysql_fetch_array($enqresult);
		$message = "Dear ".$enqrow['Name'].", One person has enquired about your ".$enqrow['Pid']." ".$enqrow['pname'].". You can contact him back on this no.".$phone.".";
		$this->sendMessage($enqrow['Phone'],$message);
		}
	}

}
   
   
  };
       // $field = "msg";
	    //$form->setError($field, "* invalid username");
/* Initialize mailer object */
$message = new Message;

?>
