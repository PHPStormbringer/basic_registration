<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

error_reporting(E_ERROR | E_WARNING );
//	error_reporting(E_ALL );

require "regis_methods.php";

function trim_value(&$value)
{
    $value = trim($value);    // this removes whitespace and related characters from the beginning and end of the string
}



if (isset($_POST['submit'])) 
{
//	print_r($_POST);

	array_filter($_POST, 'trim_value');    // the data in $_POST is trimmed

//	$_POST = filter($_POST);

	$regis['title']	  = isset($_POST['title']) ? $_POST['title'] : "";
	$regis['fname']	  = isset($_POST['fname']) ? $_POST['fname'] : "";
	$regis['lname']	  = isset($_POST['lname']) ? $_POST['lname'] : "";
	$regis['middle_initial'] = isset($_POST['middle_initial']) ? $_POST['middle_initial'] : "";

	$regis['phone']	  = isset($_POST['phone']) ? $_POST['phone'] : "";
	$regis['cell']	  = isset($_POST['cell'])  ? $_POST['cell'] : "";
	$regis['email']	  = isset($_POST['email']) ? $_POST['email'] : "";

	$regis['email_preferred'] = isset($_POST['email_preferred']) ? $_POST['email_preferred'] : "";
	
	$regis['addr1']	  = isset($_POST['addr1']) ? $_POST['addr1'] : "";
	$regis['addr2']	  = isset($_POST['addr2']) ? $_POST['addr2'] : "";
	$regis['city']	  = isset($_POST['city'])  ? $_POST['city'] : "";
	$regis['state']	  = isset($_POST['state']) ? $_POST['state'] : "";
	$regis['zip']	  = isset($_POST['zip'])   ? $_POST['zip'] : "";
	$regis['degrees'] = isset($_POST['degrees']) ? $_POST['degrees'] : "";
	
	$regis['pro_titles'] = isset($_POST['pro_titles']) ? $_POST['pro_titles'] : "";
	$regis['specialty']	= isset($_POST['specialty']) ? $_POST['specialty'] : "";

	$regis['pay_addr1']	= isset($_POST['pay_addr1']) ? $_POST['pay_addr1'] : "";
	$regis['pay_addr2']	= isset($_POST['pay_addr2']) ? $_POST['pay_addr2'] : "";
	$regis['pay_city']	= isset($_POST['pay_city'])  ? $_POST['pay_city'] : "";
	$regis['pay_state']	= isset($_POST['pay_state']) ? $_POST['pay_state'] : "";
	$regis['pay_zip']	= isset($_POST['pay_zip'])   ? $_POST['pay_zip'] : "";

	$regis['org_name']	= isset($_POST['org_name'])  ? $_POST['org_name'] : "";
	$regis['org_addr1']	= isset($_POST['org_addr1']) ? $_POST['org_addr1'] : "";
	$regis['org_addr2']	= isset($_POST['org_addr2']) ? $_POST['org_addr2'] : "";
	$regis['org_city']	= isset($_POST['org_city'])  ? $_POST['org_city'] : "";
	$regis['org_state']	= isset($_POST['org_state']) ? $_POST['org_state'] : "";
	$regis['org_zip']	= isset($_POST['org_zip'])   ? $_POST['org_zip'] : "";

	$regis['state_licensed'] = isset($_POST['state_licensed']) ? $_POST['state_licensed'] : "";
	$regis['license_number'] = isset($_POST['license_number']) ? $_POST['license_number'] : "";
	$regis['hcp_nci_number'] = isset($_POST['hcp_nci_number']) ? $_POST['hcp_nci_number'] : "";
	
	
	$regis['emergency_contact_name']  = isset($_POST['emergency_contact_name'])  ? $_POST['emergency_contact_name'] : "";
	$regis['emergency_contact_phone'] = isset($_POST['emergency_contact_phone']) ? $_POST['emergency_contact_phone'] : "";
	$regis['emergency_contact_email'] = isset($_POST['emergency_contact_email']) ? $_POST['emergency_contact_email'] : "";

	$regis['comments'] = isset($_POST['comments']) ? $_POST['comments'] : "";
	$regis['special_needs'] = isset($_POST['special_needs']) ? $_POST['special_needs'] : "";
	$regis['hotel'] = isset($_POST['hotel']) ? $_POST['hotel'] : "";
	
	$_SESSION['regis'] = $regis;

	$errors = sanitize_and_validate_POST();
	
	$_SESSION['regis_errors'] = $errors;

//	if all is good
	if (count($_SESSION['regis_errors']) == 0 )
	{
		$arrValid = $_POST;
		
		$proc = process_data($arrValid);
		
		if( $proc == true)
		{
		// send email - Not doing that this time around
		
		// Clear session variables

			header("Location: thanx.php");
		}
		else
		{
			header("Location: oopsieeee.php");
			
		}

	}
	else
	{		
		header('Location: regis.php');
	//	include "regis.php";
	}

}


?>

