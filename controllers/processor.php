<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


require("models/base_table.php");
//require("models/mysql_stuff.php");
require("models/mysql_pdo.php");

require("models/m_event_code.php");
require("models/m_event.php");
require("models/m_person.php");

class Processor {
	
	public $cxn;
	
	public $event;
	public static $arrEvent;

	
    function __construct()
    {
		$arrURI = explode( '/', $_SERVER["REQUEST_URI"]);
		
		$this->index();
		
		switch($arrURI[2])
		{
			case 'login':
				$this->login();
				break;
				
			case 'regis':
				$this->regis();
				break;

			case 'thanx':
				$this->thanx();
				break;
				
			case 'narcissus':
				$this->narcissus();
				break;
				
			case 'login_action':
				$this->login_action();
				break;
				
			case 'regis_action':
				
				$this->regis_action();
				break;
			
			default:
				$this->regis();
				break;
		}
    }
 
    public function index()
    {
		if ( !isset($_POST['txtLogin']) )
		{
			if ( isset($_SESSION['EVENT']) )
			{	
			//	print_r($_SESSION['EVENT']);
			}
			
			if (!isset($_SESSION['EVENT']) )
			{
				include('views/v_login.php');
				die;
			}
		}
		else
		{
			// I'm attempting to log in
		}
    }
	
	/* login_action() calls a model */
    public function login_action()
    {
		if ( is_null( trim( $_POST['txtLogin'])) == true )
		{
			header("Location: login");
			die;			
		}
		elseif(event_code::is_record_unique($_POST['txtLogin']) )
		{
			/* if the model returns success */
			$_SESSION['EVENT'] = $_POST['txtLogin'];
			header("Location: regis");
		}
		else
		{
			header("Location: login");
			die;
		}

    }

	/* login_action() calls a model */
    public function regis_action()
    {
	//	Why even let them in? 
		if ( is_null( trim( $_POST['submit'])) == true )
		{
			header("Location: login");
			die;			
		}
		$x = new person;
		
		if($x->success)
		{
			header("Location: thanx");
		}
		else
		{
			include('views/v_regis.php');			
		}
	//	goto thanx page
	//	goto regis page
    
	
	}



	/* login() is a view */
    public function login()
    {
		include('views/v_login.php');
		die;
    }
	
	/* regis() is a view */
    public function regis()
    {
		// Get hotel data
		event::select_record();
		
		// If a personal id is provided, get that person's information and display it.
		
		
		// Call registration view
		include('views/v_regis.php');
		die;
    }

	/* regis() is a view */
    public function thanx()
    {
		// Call registration view
		include('views/v_thanx.php');
		die;
    }



	/* narcissus() is a view */
    public function narcissus()
    {
		echo "narcissus";die;
    }


}
 
 