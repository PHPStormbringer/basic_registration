<?php
// **********************************************************************************************************
// name: m_person.php
// date: 21 mar 2016
// auth:  vvenning
//
// Proj: basic registration bootstrap
// **********************************************************************************************************
// Basic CRUD for person table 
// **********************************************************************************************************
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require("models/validation.php");

class person
{
	public static $pid;
	private $fname;
	private $mi;
	private $lname;
	private $title;
	private $degrees;
	private $cell;
	private $phone;
	private $email;
	private $email2;	//	preferred email
	private $addr1;
	private $addr2;
	private $city;
	private $state;
	private $zip;
	private $pro_titles;
	private $specialty;
	private $state_licensed;
	private $license_number;
	private $HCP_NCI_number;
	private $Payment_Mailing_Addr_1;
	private $Payment_Mailing_Addr_2;
	private $Payment_Mailing_City;
	private $Payment_Mailing_State;
	private $Payment_Mailing_Zip;

	public static $arrTable;
	public static $arrPerson;
	
	private $operation;
	public $success;
	public $errors;
	
    function __construct()
    {
	//	$this->event_code = $database_connection;
		
		if(isset($_POST) && count($_POST) > 0)
		{
			array_walk($_POST, 'trim');

			$_POST = validation::clean_POST_Array($_POST);
			
		//	print_r($_POST);
			
			$this->errors = validation::sanitize_and_validate_POST();

			$_SESSION['regis_errors'] = $this->errors;
			
			if (count($this->errors) ) 
			{
				$this->success = false;
			}
			else
			{
				$this->seed_from_POST();
							
			//	A delete will send a flag
				if( isset($_POST['DELETE']) )
				{
					$this->operation = "delete";
					$this->delete_record($_POST['pid']);
				}
			//	If there is only a pid, it's a select	
				elseif(count($_POST) < 2)
				{
					$this->operation = "select";
					self::select_record();
				}
			//	If there are the required fields, and a  pid, it's an update	
				elseif(isset($_POST['pid']))
				{
					$this->operation = "update";
					$this->update_record();
				}
			//	If there are the required fields, and no pid, it's an insert	
				else
				{
					$this->operation = "insert";
					$this->insert_record();
					self::select_record();
				}
			}
		}
    }

	function insert_record()
	{
		try
		{
			// Create connection
			$conn = db_get::get_connection();

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
			
			// Check connection
			/*
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			*/
			
			$sql = "INSERT INTO person (
				fname, mi, lname, title, degrees, cell, phone, email, preferred_email, 
				addr1, addr2, city, state, zip, 
				pro_titles, specialty, state_licensed, license_number, HCP_NCI_number, 
				Payment_Mailing_Addr_1, Payment_Mailing_Addr_2, Payment_Mailing_City, Payment_Mailing_State, Payment_Mailing_Zip) 
				VALUES (:fname, :mi, :lname, :title, :degrees, :cell, :phone, :email, :email2, :addr1, :addr2, :city, :state, :zip, :pro_titles, :specialty, :state_licensed, :license_number, :HCP_NCI_number, :Payment_Mailing_Addr_1, :Payment_Mailing_Addr_2, :Payment_Mailing_City, :Payment_Mailing_State, :Payment_Mailing_Zip)";
			
			$stmt = $conn->prepare($sql);
														  
			$stmt->bindParam(':fname', $this->fname, PDO::PARAM_STR);
			$stmt->bindParam(':mi', $this->mi, PDO::PARAM_STR);
			$stmt->bindParam(':lname', $this->lname, PDO::PARAM_STR);
			$stmt->bindParam(':title', $this->title, PDO::PARAM_STR);
			$stmt->bindParam(':degrees', $this->degrees, PDO::PARAM_STR);
			$stmt->bindParam(':cell', $this->cell, PDO::PARAM_STR);
			$stmt->bindParam(':phone', $this->phone, PDO::PARAM_STR);
			$stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
			$stmt->bindParam(':email2', $this->email2, PDO::PARAM_STR);
			
			$stmt->bindParam(':addr1', $this->addr1, PDO::PARAM_STR);
			$stmt->bindParam(':addr2', $this->addr2, PDO::PARAM_STR);
			$stmt->bindParam(':city', $this->city, PDO::PARAM_STR);
			$stmt->bindParam(':state', $this->state, PDO::PARAM_STR);
			$stmt->bindParam(':zip', $this->zip, PDO::PARAM_STR);
			
			$stmt->bindParam(':pro_titles', $this->pro_titles, PDO::PARAM_STR);
			$stmt->bindParam(':specialty', $this->specialty, PDO::PARAM_STR);
			$stmt->bindParam(':state_licensed', $this->state_licensed, PDO::PARAM_STR);
			$stmt->bindParam(':license_number', $this->license_number, PDO::PARAM_STR);
			$stmt->bindParam(':HCP_NCI_number', $this->HCP_NCI_number, PDO::PARAM_STR);
			
			$stmt->bindParam(':Payment_Mailing_Addr_1', $this->Payment_Mailing_Addr_1, PDO::PARAM_STR);
			$stmt->bindParam(':Payment_Mailing_Addr_2', $this->Payment_Mailing_Addr_2, PDO::PARAM_STR);
			$stmt->bindParam(':Payment_Mailing_City', $this->Payment_Mailing_City, PDO::PARAM_STR);
			$stmt->bindParam(':Payment_Mailing_State', $this->Payment_Mailing_State, PDO::PARAM_STR);
			$stmt->bindParam(':Payment_Mailing_Zip', $this->Payment_Mailing_Zip, PDO::PARAM_STR);
			
			$stmt->execute();
			
			self::$pid = $conn->lastInsertId();
		
			$this->success = true;
			
			$_SESSION['name'] = $this->title.". ".$this->lname;
		}
		catch(PDOException $e) 
		{
			//this will echo error code with detail
			//example: SQLSTATE[42S22]: Column not found: 1054 Unknown column 'nasme' in 'field list'
			echo $e->getMessage();
			$this->success = false;
        }
		
	//	db_get::NUKE_CXN($conn);
	}
	
	function update_record()
	{
		echo "update_record()";
	}

	static function select_record()
	{
		try {
			$error = 'There must be an existing unique numeric id to show a record';
			
			if ( !is_numeric(self::$pid) )
			{
				throw new Exception($error);
			}
		} 
		catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			die;
		}

	//	echo $db_table;die;
		$x = db_get::get_connection();
		$handle = $x->prepare("select * from person where pid = ?");

		$handle->bindValue(1, self::$pid);
		$handle->execute();
	
		$result = $handle->fetchAll(\PDO::FETCH_OBJ);
				
/*		foreach($result as $row)
		{
			self::$arrEvent = (array)$row;
		}
*/
		foreach($result as $row)
		{
			$arrX = (array)$row;
		}

		array_walk($arrX, 'trim');

		self::$arrPerson = $arrX;
		$_SESSION['person'] = $arrX;		
	}
	
	function delete_record($uid)
	{
		
		
	}

/*	This function assigns all the results from the $_POST array to class values.
	There might be some advantage in making those variables private
*/
	function seed_from_POST()
	{
		foreach($_POST as $key => $value)
		{
			$this->$key = !isset($key[$value]) || is_null(trim($key[$value]))   ? "" : $value;
			if ($key != "submit")
			{
				$this->$key = $value;
			//	echo "<br />".$this->$key;
			}
		}
	}



	function seed_from_POST_orig()
	{
		echo "<br />seed from POST<br /><br />";
		$this->pid     = !isset($_POST['pid'])   || is_null(trim($_POST['pid']))   ? "" : $_POST['pid']; 
		$this->fname   = !isset($_POST['fname']) || is_null(trim($_POST['fname'])) ? "" : $_POST['fname']; 
		$this->mi      = !isset($_POST['mi'])    || is_null(trim($_POST['mi']))    ? "" : $_POST['mi']; 
		$this->lname   = !isset($_POST['lname']) || is_null(trim($_POST['lname'])) ? "" : $_POST['lname']; 
		
		$this->title   = !isset($_POST['lname']) || is_null(trim($_POST['title']))   ? "" : $_POST['title']; 
		$this->degrees = is_null(trim($_POST['degrees'])) ? "" : $_POST['degrees']; 
		$this->phone   = is_null(trim($_POST['phone']))   ? "" : $_POST['phone']; 
		$this->cell    = is_null(trim($_POST['cell']))    ? "" : $_POST['cell']; 
		$this->email   = is_null(trim($_POST['email']))   ? "" : $_POST['email']; 

		$this->preferred_email = is_null(trim($_POST['email2'])) ? "" : $_POST['email2']; 

		$this->addr1   = is_null(trim($_POST['addr1']))   ? "" : $_POST['addr1']; 
		$this->addr2   = is_null(trim($_POST['addr2']))   ? "" : $_POST['addr2']; 
		$this->city    = is_null(trim($_POST['city']))    ? "" : $_POST['city']; 
		$this->state   = is_null(trim($_POST['state']))   ? "" : $_POST['state']; 
		$this->zip     = is_null(trim($_POST['zip']))     ? "" : $_POST['zip']; 

		$this->pro_titles = is_null(trim($_POST['pro_titles'])) ? "" : $_POST['pro_titles']; 
		$this->specialty  = is_null(trim($_POST['specialty']))  ? "" : $_POST['specialty']; 
		
		$this->state_licensed  = !isset($_POST['state_licensed']) || is_null(trim($_POST['state_licensed']))  ? "" : $_POST['state_licensed']; 
		$this->license_number  = is_null(trim($_POST['license_number']))  ? "" : $_POST['license_number']; 
		$this->HCP_NCI_number  = is_null(trim($_POST['HCP_NCI_number']))  ? "" : $_POST['HCP_NCI_number']; 

		$this->Payment_Mailing_Addr_1 = is_null(trim($_POST['Payment_Mailing_Addr_1'])) ? "" : $_POST['Payment_Mailing_Addr_1']; 
		$this->Payment_Mailing_Addr_2 = is_null(trim($_POST['Payment_Mailing_Addr_2'])) ? "" : $_POST['Payment_Mailing_Addr_2']; 
		$this->Payment_Mailing_City   = is_null(trim($_POST['Payment_Mailing_City']))   ? "" : $_POST['Payment_Mailing_City']; 
		$this->Payment_Mailing_State  = is_null(trim($_POST['Payment_Mailing_State']))  ? "" : $_POST['Payment_Mailing_State']; 
		$this->Payment_Mailing_Zip    = is_null(trim($_POST['Payment_Mailing_Zip']))    ? "" : $_POST['Payment_Mailing_Zip']; 

/*		$this->pid 
		$this->fname
		$this->mi
		$this->lname
		$this->title
		$this->degrees
		$this->cell
		$this->email
		$this->preferred_email
		$this->addr1
		$this->addr2
		$this->city
		$this->state
		$this->zip
		$this->pro_titles
		$this->specialty
		$this->state_licensed
		$this->license_number
		$this->HCP_NCI_number
		$this->Payment_Mailing_Addr_1
		$this->Payment_Mailing_Addr_2
		$this->Payment_Mailing_City
		$this->Payment_Mailing_State
		$this->Payment_Mailing_Zip
*/
	}



}
