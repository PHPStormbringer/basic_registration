<?php

require_once('config/config_basic-r.php');

class db_get
{
	const db_srvr = Config::DB_HOST;
	const db_user = Config::DB_USER;
	const db_pswd = Config::DB_PASS;
	const db_name = Config::DB_NAME;

    const INSERT = "INSERT";
    const UPDATE = "UPDATE";
	
    public static function get_connection()
    {
	    return self::MAKE_CXN(self::db_srvr, self::db_user, self::db_pswd, self::db_name);
    }
    
	// ******************************************************************************************************
	// Note:  Theoretically, you could split up connecting to MySQL and connecting to the db
	// ******************************************************************************************************
    public static function MAKE_CXN_orig($x_server, $x_user, $x_pswd, $x_database)
    {
        $con = mysqli_connect($x_server, $x_user, $x_pswd, $x_database);
        if (!$con)
	    {
	        die('Could not connect: '  . time() . " :" . mysqli_error());
	    }

	    return $con;
    }


    public static function MAKE_CXN($x_server, $x_user, $x_pswd, $x_database)
    {
		try{
			// Create a new connection.
			// You'll probably want to replace hostname with localhost in the first parameter.
			// Note how we declare the charset to be utf8mb4.  This alerts the connection that we'll be passing UTF-8 data.  This may not be required depending on your configuration, but it'll save you headaches down the road if you're trying to store Unicode strings in your database.  See "Gotchas".
			// The PDO options we pass do the following:
			// \PDO::ATTR_ERRMODE enables exceptions for errors.  This is optional but can be handy.
			// \PDO::ATTR_PERSISTENT disables persistent connections, which can cause concurrency issues in certain cases.  See "Gotchas".
			$link = new \PDO(   'mysql:host=localhost;dbname=registration;charset=utf8mb4',
								'root',
								'',
								array(
									\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
									\PDO::ATTR_PERSISTENT => false
								)
							);
		
			
		}
		catch(\PDOException $ex){
			print($ex->getMessage());
		}
		
		return $link;

	}

    public static function NUKE_CXN($cxn)
    {
        $cxn = NULL;
    }
}

?>