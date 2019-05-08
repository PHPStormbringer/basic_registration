<?php
// **********************************************************************************************************
// name: m_event_code.php
// date: 18 mar 2016
// auth:  vvenning
//
// Proj: basic registration bootstrap
// **********************************************************************************************************
// Basic CRUD for event_code table 
// **********************************************************************************************************
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class event_code implements base_table
{
	public $cxn;
	
    function __construct()
    {
//		$this->cxn = $database_connection;
    }
	
	public static function insert_record(array $arrTable)
	{
		
	}
	
	public static function update_record(array $arrTable)
	{
		
	}

	public static function select_record($uid)
	{
		
	}
	
	public static function delete_record($uid)
	{
		
		
	}

	public static function select_count_record($uid)
	{

		$x = db_get::get_connection();
		$handle = $x->prepare('select COUNT(*) from eventcode where EventCode = ?');

		$handle->bindValue(1, $uid);
		$handle->execute();
	
		$number_of_rows = $handle->fetchColumn(); 
		
		return $number_of_rows;
	}

	public static function is_record_unique($uid)
	{
		$x = self::select_count_record($uid);
				
		return $x === "1" ? true : false;
	}


	/*
	public static function get_column_names();
    public static function get_one_record_by_id($int_pid);
    public static function get_last_record();
	public static function get_all_records();
	public static function get_active_records();
	public static function fromArray($data, $class = __CLASS__);
	*/
}

?>