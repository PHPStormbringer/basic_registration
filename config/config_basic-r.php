<?php
// ***********************************************************
// name: config_basic-r.php
// date: 15 mar 2016
// auth:  vvenning
//
// Proj: basic registration
// *****************************************************
// 

class Config
{
//	DB credntials

	const DB_HOST				= 'localhost';
	const DB_USER				= 'root';
//	const DB_PASS				= 'ShadowJack';
	const DB_PASS				= '';	
//	const DB_NAME				= 'theatre_company';
	const DB_NAME				= 'registration';
	
//	Hostmonster
/*
	const DB_HOST				= '184.168.154.89';
	const DB_USER				= 'xptheater';
	const DB_PASS				= 'Sh@d0wJ@cK';
	const DB_NAME				= 'xptheater';
*/



	// email validation regex
	const EMAIL_REGEX		= '^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$';

	const DEBUG_MODE			= true;
	const FATAL_ERROR_FOLDER	= '../../logs';
    const DIRECTORY_SEPARATOR   = '/';
	// salt portion for password encryption
	const PWD_SALT			= 'not';

}

?>