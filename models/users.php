<?php
// **********************************************************************************************************
// name: users.php
// date: 23 feb 2011
// auth:  vvenning
//
// Proj: Casio.com refresh
// **********************************************************************************************************
// SELECT, INSERT, UPDATE, DELETE functions for users MySQL table 
// **********************************************************************************************************

require_once('mysql_stuff.php');

class user
{
    public $id;
	public $email;
	public $password;
    public $authority;
	public $active;

    public static function authenticate($user, $pswd)
    {
        $con = db_get::get_connection();

//        $query = "SELECT authority FROM `users` WHERE email = '" . $user . "' AND password = '" . $pswd . "' AND active = 1";  
//        $query = "CALL sp_usersAUTHENTICATE('user1@test.com', '5a105e8b9d40e1329780d62ea2265d8a', 1)";

        $query = "CALL sp_usersAUTHENTICATE(\"" . $user . "\", \"" .
		                                          $pswd   . "\", \"" .
												  1 . "\")";  
			
        $result = db_get::QUERY($con, $query);
		
        if (isset($result))
		{
		    $i = 0;

            $row = mysqli_fetch_array($result);
	    
            db_get::NUKE_CXN($con);
			
    		if ($row[0] > 0 && $row[0] < 5)
	    	{
                $_SESSION['user']=$user;
                $_SESSION['pswd']=$pswd;
                $_SESSION['auth']=$row[0];
			
    			return true;
	    	}
			else
		    {
		        return false;
		    }
		}
	    return false;
	}

	// **************************************************************************
	// name: does_user_exist
	// func: check email address to see if it's in db
	// date: 02-25-11
	// auth: vvenning
	// **************************************************************************
    public static function does_user_exist($user)
    {
        $con = db_get::get_connection();

        $query = "CALL sp_usersEXIST(\"" . $user . "\")";  
	
        $result = db_get::QUERY($con, $query);
		
        if (isset($result))
		{
		    $i = 0;

            $row = mysqli_fetch_array($result);
		
   			return $row;
    	}
		
	    return false;
	}	
	
	public static function change_password()
	{
	    // Get random number
		
		$new_root     = rand(1, 1000000); 
        
		$alt_root = "casio" . $newbase . "usa";
		
	    $new_pswd = validation::encrypt($alt_root);
	    
		return $new_pswd;
	}
	public static function get_column_names()
	{
	    $con = db_get::get_connection();

        $str_TableName = "users";
	
        $query = "CALL sp_GetDbColumnNames(\"users\")";

        $result = db_get::QUERY($con, $query);
	
        $i = 0;
	
        while($row = mysqli_fetch_array($result))
        {
            $arr_colnames[$i] = $row[0];
		
            $i++;
        }
	
        mysqli_free_result($result);
	
        db_get::NUKE_CXN($con);
		
		return $arr_colnames;

	}
	
    public static function get_one_record_by_id($int_id)
	{
        $con = db_get::get_connection();
	
        $query = "CALL sp_usersSELECT(" . $int_id . ")";

        $result = db_get::QUERY($con, $query);

        $i = 0;

        $row = mysqli_fetch_array($result);
	
        db_get::NUKE_CXN($con);
		
		return $row;
	}	
    
	public static function get_all_records()
	{
        $con = db_get::get_connection();

        $result = db_get::QUERY($con, "CALL sp_usersSELECT_ALL()");

        $i = 0;

        while($row = mysqli_fetch_array($result))
        {
            $arr_everything[$i] = $row;
   
            $i++;
        }

        mysqli_free_result($result);

        db_get::NUKE_CXN($con);
		
		return $arr_everything;	
	}

	public static function fromArray($data, $class = __CLASS__)
	{
        $user = new user();
		
        $user->id         = $data['id'];
        $user->email      = $data['email'];
        $user->password   = $data['password'];
        $user->authority  = $data['authority'];
        $user->active     = $data['active'];
		$user->logoncount = $data['logoncount'];
		
        return $user;	
	}
	
	public static function insert_record(user $u)
	{
        $con = db_get::get_connection();
        
		$query = "CALL sp_usersINSERT(\"" . $u->email   . "\", \"" . 
		                                    $u->password   . "\", \"" .
		                                    $u->authority   . "\", \"" .												  
											$u->active . "\")";
											   
        $result = db_get::QUERY($con, $query);

        db_get::NUKE_CXN($con);
		
		return $result;	
	
	}

	public static function update_record(user $u)
	{
        $con = db_get::get_connection();
        
		$query = "CALL sp_usersUPDATE(\"" . $u->id   . "\", \"" . 
                                            $u->email   . "\", \"" . 
		                                    $u->password   . "\", \"" .
		                                    $u->authority   . "\", \"" .												  
											$u->active . "\")";
											   
        $result = db_get::QUERY($con, $query);

        db_get::NUKE_CXN($con);
		
		return $result;	
	
	}	

	public static function delete_record($int_id)
	{
        $con = db_get::get_connection();
        
		$query = "CALL sp_usersDELETE(" . $int_id   . ")";
											   
        $result = db_get::QUERY($con, $query);

        db_get::NUKE_CXN($con);
		
		return $result;	
	
	}

}

?>