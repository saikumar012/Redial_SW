<?php
/**
 * Database.php
 * 
 * The Database class is meant to simplify the task of accessing
 * information from the website's database.
 *
 */
include("constants.php");
      
class MySQLDB
{
   var $connection;         //The MySQL database connection
   var $num_active_users;   //Number of active users viewing site
   var $num_active_guests;  //Number of active guests viewing site
   var $num_members;        //Number of signed-up users
   /* Note: call getNumMembers() to access $num_members! */

   /* Class constructor */
   function MySQLDB(){
      /* Make connection to database */
     $this->connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or die(mysql_error());
     mysql_select_db(DB_NAME, $this->connection) or die(mysql_error());
      //$this->connection = mysql_connect("localhost", "root", "") or die(mysql_error());
      //mysql_select_db("db_projector", $this->connection) or die(mysql_error());

      /**
       * Only query database to find out number of members
       * when getNumMembers() is called for the first time,
       * until then, default value set.
       */
      $this->num_members = -1;
      
      if(TRACK_VISITORS){
         /* Calculate number of users at site */
         $this->calcNumActiveUsers();
      
         /* Calculate number of guests at site */
         $this->calcNumActiveGuests();
      }
   }

   /**
    * confirmUserPass - Checks whether or not the given
    * username is in the database, if so it checks if the
    * given password is the same password in the database
    * for that user. If the user doesn't exist or if the
    * passwords don't match up, it returns an error code
    * (1 or 2). On success it returns 0.
    */
   function confirmUserPass($username, $password){
      /* Add slashes if necessary (for query) */
      if(!get_magic_quotes_gpc()) {
	      $username = addslashes($username);
      }

      /* Verify that user is in database */
      $q = "SELECT password FROM ".TBL_USERS." WHERE username = '$username' and Active=1";
      $result = mysql_query($q, $this->connection);
      if(!$result || (mysql_numrows($result) < 1)){
         return 1; //Indicates username failure
      }

      /* Retrieve password from result, strip slashes */
      $dbarray = mysql_fetch_array($result);
      $dbarray['password'] = stripslashes($dbarray['password']);
      $password = stripslashes($password);

      /* Validate that password is correct */
      if($password == $dbarray['password']){
         return 0; //Success! Username and password confirmed
      }
      else{
         return 2; //Indicates password failure
      }
   }
   
   /**
    * confirmUserID - Checks whether or not the given
    * username is in the database, if so it checks if the
    * given userid is the same userid in the database
    * for that user. If the user doesn't exist or if the
    * userids don't match up, it returns an error code
    * (1 or 2). On success it returns 0.
    */
   function confirmUserID($username, $userid){
      /* Add slashes if necessary (for query) */
      if(!get_magic_quotes_gpc()) {
	      $username = addslashes($username);
      }

      /* Verify that user is in database */
      $q = "SELECT userid FROM ".TBL_USERS." WHERE username = '$username'";
      $result = mysql_query($q, $this->connection);
      if(!$result || (mysql_numrows($result) < 1)){
         return 1; //Indicates username failure
      }

      /* Retrieve userid from result, strip slashes */
      $dbarray = mysql_fetch_array($result);
      $dbarray['userid'] = stripslashes($dbarray['userid']);
      $userid = stripslashes($userid);

      /* Validate that userid is correct */
      if($userid == $dbarray['userid']){
         return 0; //Success! Username and userid confirmed
      }
      else{
         return 2; //Indicates userid invalid
      }
   }
   
   /**
    * usernameTaken - Returns true if the username has
    * been taken by another user, false otherwise.
    */
   function usernameTaken($username){
      if(!get_magic_quotes_gpc()){
         $username = addslashes($username);
      }
      $q = "SELECT username FROM ".TBL_USERS." WHERE username = '$username'";
      $result = mysql_query($q, $this->connection);
      return (mysql_numrows($result) > 0);
   }
   
   /**
    * usernameBanned - Returns true if the username has
    * been banned by the administrator.
    */
   function usernameBanned($username){
      if(!get_magic_quotes_gpc()){
         $username = addslashes($username);
      }
      $q = "SELECT username FROM ".TBL_BANNED_USERS." WHERE username = '$username'";
      $result = mysql_query($q, $this->connection);
      return (mysql_numrows($result) > 0);
   }
   
   /**
    * addNewUser - Inserts the given (username, password, email)
    * info into the database. Appropriate user level is set.
    * Returns true on success, false otherwise.
    */
   function addNewUser($division, $department, $name, $mobile, $email, $empid, $city, $whrereincity, $zone, $username, $password){
      $time = time();
      /* If admin sign up, give admin user level */
      if(strcasecmp($username, ADMIN_NAME) == 0){
         $ulevel = ADMIN_LEVEL;
      }else{
         $ulevel = USER_LEVEL;
      }
	  if($active == "true"){
	  $active = 1;
	  }else if($active == "false"){
	  $active = 0;
	  }
	  
      $q = "INSERT INTO ".TBL_USERS." VALUES ('','$division', '$department', '$name', '$mobile', '$email', '$empid', '$city', '$whrereincity', '$zone', '$username', '$password', '0', '$ulevel', '$time', '0')";
	  return mysql_query($q, $this->connection); 
   }
   
   /**
    * updateUserField - Updates a field, specified by the field
    * parameter, in the user's row of the database.
    */
   function updateUserField($division, $department, $name, $mobile, $email, $empid, $city, $whrereincity, $zone, $username, $orempid){
      $q = "UPDATE ".TBL_USERS." SET division = '$division', department = '$department', name = '$name', mobile = '$mobile', email = '$email', EmployeeId = '$empid', EmployeeId = '$empid', city = '$city', whrereincity = '$whrereincity', zone = '$zone', username = '$username'  WHERE id = '$orempid'";
	  echo $q;
	  //exit;

      return mysql_query($q, $this->connection);
   }
   
    function updateUserField1($username, $field, $value){
      $q = "UPDATE ".TBL_USERS." SET ".$field." = '$value' WHERE username = '$username'";
      return mysql_query($q, $this->connection);
   }
   /**
    * getUserInfo - Returns the result array from a mysql
    * query asking for all information stored regarding
    * the given username. If query fails, NULL is returned.
    */
   function getUserInfo($username){
      $q = "SELECT * FROM ".TBL_USERS." WHERE username = '$username'";
      $result = mysql_query($q, $this->connection);
      /* Error occurred, return given name by default */
      if(!$result || (mysql_numrows($result) < 1)){
         return NULL;
      }
      /* Return result array */
      $dbarray = mysql_fetch_array($result);
      return $dbarray;
   }
   
   /**
    * getNumMembers - Returns the number of signed-up users
    * of the website, banned members not included. The first
    * time the function is called on page load, the database
    * is queried, on subsequent calls, the stored result
    * is returned. This is to improve efficiency, effectively
    * not querying the database when no call is made.
    */
   function getNumMembers(){
      if($this->num_members < 0){
         $q = "SELECT * FROM ".TBL_USERS;
         $result = mysql_query($q, $this->connection);
         $this->num_members = mysql_numrows($result);
      }
      return $this->num_members;
   }
   
   /**
    * calcNumActiveUsers - Finds out how many active users
    * are viewing site and sets class variable accordingly.
    */
   function calcNumActiveUsers(){
      /* Calculate number of users at site */
      $q = "SELECT * FROM ".TBL_ACTIVE_USERS;
      $result = mysql_query($q, $this->connection);
      $this->num_active_users = mysql_numrows($result);
   }
   
   /**
    * calcNumActiveGuests - Finds out how many active guests
    * are viewing site and sets class variable accordingly.
    */
   function calcNumActiveGuests(){
      /* Calculate number of guests at site */
      $q = "SELECT * FROM ".TBL_ACTIVE_GUESTS;
      $result = mysql_query($q, $this->connection);
      $this->num_active_guests = mysql_numrows($result);
   }
   
   /**
    * addActiveUser - Updates username's last active timestamp
    * in the database, and also adds him to the table of
    * active users, or updates timestamp if already there.
    */
   function addActiveUser($username, $time){
      $q = "UPDATE ".TBL_USERS." SET timestamp = '$time' WHERE username = '$username'";
      mysql_query($q, $this->connection);
      
      if(!TRACK_VISITORS) return;
      $q = "REPLACE INTO ".TBL_ACTIVE_USERS." VALUES ('$username', '$time')";
      mysql_query($q, $this->connection);
      $this->calcNumActiveUsers();
   }
   
   /* addActiveGuest - Adds guest to active guests table */
   function addActiveGuest($ip, $time){
      if(!TRACK_VISITORS) return;
      $q = "REPLACE INTO ".TBL_ACTIVE_GUESTS." VALUES ('$ip', '$time')";
      mysql_query($q, $this->connection);
      $this->calcNumActiveGuests();
   }
   
   /* These functions are self explanatory, no need for comments */
   
   /* removeActiveUser */
   function removeActiveUser($username){
      if(!TRACK_VISITORS) return;
      $q = "DELETE FROM ".TBL_ACTIVE_USERS." WHERE username = '$username'";
      mysql_query($q, $this->connection);
      $this->calcNumActiveUsers();
   }
   
   /* removeActiveGuest */
   function removeActiveGuest($ip){
      if(!TRACK_VISITORS) return;
      $q = "DELETE FROM ".TBL_ACTIVE_GUESTS." WHERE ip = '$ip'";
      mysql_query($q, $this->connection);
      $this->calcNumActiveGuests();
   }
   
   /* removeInactiveUsers */
   function removeInactiveUsers(){
      if(!TRACK_VISITORS) return;
      $timeout = time()-USER_TIMEOUT*60;
      $q = "DELETE FROM ".TBL_ACTIVE_USERS." WHERE timestamp < $timeout";
      mysql_query($q, $this->connection);
      $this->calcNumActiveUsers();
   }

   /* removeInactiveGuests */
   function removeInactiveGuests(){
      if(!TRACK_VISITORS) return;
      $timeout = time()-GUEST_TIMEOUT*60;
      $q = "DELETE FROM ".TBL_ACTIVE_GUESTS." WHERE timestamp < $timeout";
      mysql_query($q, $this->connection);
      $this->calcNumActiveGuests();
   }
   
   /**
    * query - Performs the given query on the database and
    * returns the result, which may be false, true or a
    * resource identifier.
    */
   function query($query){
      return mysql_query($query, $this->connection);
   }
   function getUserList(){
		$q = "select Id, division, department, name, mobile, email, EmployeeId, city, whrereincity, zone, username, userid, Active from ".TBL_USERS." where userlevel = 1 ORDER BY `timestamp` DESC";
		if($result = mysql_query($q)){
		return $result;
		}else{
		return 1;
		}	
	}
	function getUserListById($id){
	$q = "select Id, division, department, name, mobile, email, EmployeeId, city, whrereincity, zone, username, userid, Active from ".TBL_USERS." where Id = '$id' AND userlevel = 1";		
		if($result = mysql_query($q)){
		return $result;
		}else{
		return 1;
		}	
	}
	function getCityList(){
		$q = "select * from city order by city ASC";
		$result = mysql_query($q);
			return $result;
	}
	function getCityList_search($id){
		$q = "select * from city where sno='$id'";
		$result = mysql_query($q);
			return $result;
	}
	function getPropertyList(){
		$q = "select * from propertytype";
		$result = mysql_query($q);
			return $result;
	}
	function getPropertyList_search($id){
		$q = "select * from propertytype where sno='$id'";
		$result = mysql_query($q);
			return $result;
	}
	function getlocation(){
		$q = "select sno,location from location";
		$result = mysql_query($q);
			return $result;
	}
	function getlocation_search($id){
		$q = "select location from location where sno='$id'";
		$result = mysql_query($q);
			return $result;
	}
	function getLocationList($id){
		$q = "select sno,location from location where city_id = '$id'";
		$result = mysql_query($q);
			return $result;
	}
	function getPropertiesList($id,$id1){
		$q = "select * from projects where Ptype = '$id' and ProjectType = '$id1'";
		$result = mysql_query($q);
			return $result;
	}
	/////newly added
	function getPropertiesList1($id,$id1){
		$q = "select * from projects where Ptype = '$id' and ProjectType = '$id1'";
		//$result = mysql_query($q);
			return $q;
	}
	/*function getPropertiesList1(){
		$q = "select * from projects where Ptype = '1' and ProjectType = '1'";
		$result = mysql_query($q);
			return $result;
	}
	function getPropertiesList2(){
		$q = "select * from projects where Ptype = '2' and ProjectType = '1'";
		$result = mysql_query($q);
			return $result;
	}
	function getPropertiesList3(){
		$q = "select * from projects where Ptype = '2' and ProjectType = '2'";
		$result = mysql_query($q);
			return $result;
	}*/
	function getProjectList(){
	$q = "select * from projects where Ptype = 2";
		$result = mysql_query($q);
			return $result;
	}
	function getCurrentProjectHistory($id){
	$q = "select * from projects where Ptype = 2 AND id = '$id'";
	$result = mysql_query($q);
		return $result;
	}
	function getProjectH(){
	$q = "select * from projects where Pid like % 'PJ%'";
	$result = mysql_query($q);
		return $result;
	}
	function getProjectH1(){
	$q = "select * from projects where Pid like % 'PR%'";
	$result = mysql_query($q);
		return $result;
	}

	function getCurrentPropertyHistory($id){
	$q = "select * from projects where Ptype = 1 AND id = '$id'";
	$result = mysql_query($q);
		return $result;
	}
	function getAgentsList($id){
	$q = "select * from agents where ptype = '$id'";
	$result = mysql_query($q);
		return $result;
	}
	function getAgentsList1($id){
	$q = "select * from agents where ptype = '$id'";
	//$result = mysql_query($q);
		return $q;
	}
	function getAgentsList2($id){
	$q = "select * from agents where `id`= '$id'";
	   $result = mysql_query($q);
		return $result;
	}
	function getCurrentAgentData($id){
	$q = "selcet * from agents where id = '$id' ";
	$result = mysql_query($q);
		return $result; 
	}
	function getCurrentAgentData1($id){
	$q = "SELECT * FROM `agents` WHERE  AgentID = '$id' ";
	$result = mysql_query($q);
		return $result; 
	}
	function del_getCurrentAgentData1($id){
	$q = "SELECT * FROM `del_agents` WHERE  AgentID = '$id' ";
	$result = mysql_query($q);
		return $result; 
	}
	function getBuyersList($id){
	$q = "select * from buyers where ProjectType = '$id'";
	$result = mysql_query($q);
	return $result;
	}
	function getBuyList($id){
	$q = "select * from buyers where Buyerid = '$id'";
	$result = mysql_query($q);
	return $result;
	}
    function del_getBuyList($id){
	$q = "select * from del_buyers where Buyerid = '$id'";
	$result = mysql_query($q);
	return $result;
	}
	//////////////////////////////
	function getBuyersListz($id){
	$q = "select * from buyers where id = '$id'";
	$result = mysql_query($q);
	return $result;
	}
	////////////////////////////////////
	function getBuyersList2($id){
	$q = "select * from buyers where Buyerid = '$id'";
	$result = mysql_query($q);
	return $result;
	}
	//////newly added
	function getBuyersList1($id){
	$q = "select * from buyers where ProjectType = '$id'";
	//$result = mysql_query($q);
	return $q;
	}
	function getPriceList_Min(){
	$q = "select * from minimum";
	$result = mysql_query($q);
	return $result;
	}
	function getPriceList_Max(){
	$q = "select * from maximum";
	$result = mysql_query($q);
	return $result;
	}
	
	function getSearchCategory(){
	$q = "select * from search";
	$result = mysql_query($q);
	return $result;
	}
	function getProjectId($id){
	$q = "select * from projects where Pid = '$id'";
	$result = mysql_query($q);
	return $result;
	}
	function del_getProjectId($id){
	$q = "select * from del_projects where Pid = '$id'";
	$result = mysql_query($q);
	return $result;
	}
	function getSubscriptionC($id){
	$q = "select * from subscription where Pid = '$id'";
	$result = mysql_query($q);
	return $result;
	}
	function getaLLSubscriptionC(){
	$q = "select * from subscription";
	$result = mysql_query($q);
	return $result;
	}
	function getsubscription($id){
	$q = "select * from subscription where Pid='$id'";
	$result = mysql_query($q);
	return $result;
	}
	function getProjectId1($id){
	$q = "select * from projects where Pid = '$id'";
	$result = mysql_query($q);
	return $result;
	}
	function insert_time($id)
	{
	$time = time();
	$q = "insert into time(hfv,verify,active,Pid) values('$time','','','$id')";
	$result = mysql_query($q);
	return $result;
	}
	function getDealinginList(){
	$q = "SELECT * from dealing";
	$result = mysql_query($q);
	return $result;
	}
	function getPname($id){
	$q = "SELECT * from gc_properties where rctype='$id'";
	$result = mysql_query($q);
	return $result;
	}
	function getPnamepj($id){
	$q = "SELECT * from gc_projects where rctype='$id'";
	$result = mysql_query($q);
	return $result;
	}
	function getGCProperties(){
	$q = "SELECT * FROM gc_properties";
	$result = mysql_query($q);
	return $result;
	}
	function getGCPropertiesById($type,$id){
	$q = "SELECT * from gc_properties where rctype='$type' AND Pid='$id'";
	$result = mysql_query($q);
	return $result;
	}
	function getGCPropertiesId($id){
	$q = "SELECT * from gc_properties where Pid='$id'";
	$result = mysql_query($q);
	return $result;
	}
	function getGCPropertiesByType($type){
	$q = "SELECT * from gc_properties where rctype='$type'";
	}
	function getGCProjectById($type,$id){
	$q =  "SELECT * from gc_projects where rctype='$type' AND Pid='$id'";
	$result = mysql_query($q);
	return $result;
	}
	function getGCProjectId($id){
	$q =  "SELECT * from gc_projects where Pid='$id'";
	$result = mysql_query($q);
	return $result;
	}
	function getDealingById($id){
	$q = "SELECT * FROM dealing where id='$id'";
	$result = mysql_query($q);
		while($row = mysql_fetch_array($result)){
			if($id == $row['Id']){
				return $row['Dealing'];
			}
		}
	}
	function insert_time_update($id)
	{
	$time = time();
	$q = "update `time` set `hfv`='$time',`deactive`='' where `Pid`='$id'";
	$result = mysql_query($q);
	return $result;
	}
	function insert_time_verify($id)
	{
	$time = time();
	$q = "update `time` set `verify`='$time',`deactive`='' where `Pid`='$id'";
	$result = mysql_query($q);
	return $result;
	}
	function insert_time_active($id)
	{
	$date2=time()+(30*24*60*60);
	$time = time();
	$q = "update `time` set `active`='$time',`deactive`='$date2' where `Pid`='$id'";
	$result = mysql_query($q);
	return $result;
	}
	function insert_time_deactive($id)
	{
	$time = time();
	$q = "update `time` set `deactive`='$time' where `Pid`='$id'";
	$result = mysql_query($q);
	return $result;
	}
	function get_time($id,$id1)
	{
	$sql="select * from time where `Pid`='".$id1."'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	if($id==0)
	{
	$time1=date("d/m/y - h:i A", $row['hfv']+41400);
	return $time1;
	}
	if($id==1)
	{
	$time2=date("d/m/y - h:i A", $row['verify']+41400);
	return $time2;
	}
	if($id==2)
	{
	$time3=date("d/m/y h:i A", $row['active']+41380);
	return $time3;
	}
	if($id==3)
	{
	$time4=date("d/m/y h:i A", $row['deactive']+41400);
	return $time4;
	}
	}
};
/* Create database connection */
$database = new MySQLDB;

?>
