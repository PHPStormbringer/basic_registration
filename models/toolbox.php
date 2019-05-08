<?php
// **********************************************************************************************************
// name: toolbox.php
// date: 24 feb 2011
// auth:  vvenning
//
// Proj: Casio.com refresh
// **********************************************************************************************************
// Generally useful stuff 
// **********************************************************************************************************

class toolbox
{
    // check username/password 'check u.p.'
    public static function check_up() 
    {



    	if (!isset($_SESSION['user']) || !isset($_SESSION['pswd']) || "" == $_SESSION['user'] || "" == $_SESSION['pswd'] )
        {
            $_SESSION['user'] = "";
			$_SESSION['pswd'] = "";
			$_SESSION['auth'] = "";
			
			header('Location: logon.php');
        }	
	}
    public static function curPageName() 
	{
        return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
    }
	
	public static function getPageName() 
	{
    	$currentFile = $_SERVER["PHP_SELF"];
        $parts = Explode('/', $currentFile);
        return   $parts[count($parts) - 1];
    }

	public static function send_email($str_email, $msg) 	
	{

	//$to = $str_email;
        $to = "vvenning@casio.com";
        $subject = "Test mail";
        $message = "Hello! This is a simple email message.";
        $from = "someonelse@example.com";
        $headers = "From: $from";
        
		

        if (mail($to,$subject,$message,$headers)) 
		{
            return true;
        } 
		else 
		{
            return false;
        }
    }
    public static function tracker($text)
    {
        $fh = fopen("tracker.txt", "w+");
	    fwrite($fh, Date . ": " . $text);
		fclose($fh);
	}
}

?>