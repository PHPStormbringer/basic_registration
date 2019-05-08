<?php
// **********************************************************************************************************
// name: base_table.php
// date: 18 mar 2016
// auth:  vvenning
//
// Proj: basic registration bootstrap
// **********************************************************************************************************
// This is an interface.  SELECT, INSERT, UPDATE, DELETE functions for productions MySQL table 
// **********************************************************************************************************

interface base_table
{
	public static function insert_record(array $arrTable);
	public static function update_record(array $arrTable);

	public static function select_record($uid);
	public static function delete_record($uid);

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