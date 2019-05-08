<?php
// **********************************************************************************************************
// name: m_event.php
// date: 18 mar 2016
// auth:  vvenning
//
// Proj: basic registration bootstrap
// **********************************************************************************************************
// Basic CRUD for event table 
// **********************************************************************************************************
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class event
{
	public $eid;
	public $event_name;
	public $event_code;
	public $contact_name;
	public $contact_email;
	public $contact_phone;
	public $hotel_name;
	public $hotel_addr1;
	public $hotel_addr2;
	public $hotel_city;
	public $hotel_state;
	public $hotel_zip;
	public $hotel_phone;
	public $arrival_date;
	public $event_date_init;
	public $event_date_fini;
	
	public static $arrEvent;
	
    function __construct()
    {
	//	$this->event_code = $database_connection;
    }

	function insert_record(array $arrTable)
	{
		
	}
	
	function update_record(array $arrTable)
	{
		
	}

	static function select_record()
	{
		$db_table = strtolower($_SESSION['EVENT'])."_event";
	//	echo $db_table;die;
		$x = db_get::get_connection();
		$handle = $x->prepare("select * from ".$db_table);

		$handle->bindValue(1, strtolower($db_table));
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

	//	self::$arrEvent = $arrX;
		
		$_SESSION['EVENT_DATA'] = $arrX;
	}
	
	function delete_record($uid)
	{
		
		
	}




}
