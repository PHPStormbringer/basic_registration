<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//	error_reporting(E_ERROR | E_WARNING );
	error_reporting(E_ALL );

include_once "definitions_rsvp.php";
include_once "config_rsvp.php";

function sanitize_and_validate_POST()
{
	// sanitize title
	if ($_POST['title'] != "") 
	{
    	$_POST['title'] = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    	if ($_POST['title'] == "") 
		{
        	$errors['title'] = ERR_TITLE_VALID;
    	}
	} 
	elseif(REQ_title == true)
	{
    	$errors['title'] = ERR_TITLE_EMPTY; // This is only necessary if it is a required field
	}

	// sanitize degrees
	if ($_POST['degrees'] != "") 
	{
    	$_POST['degrees'] = filter_var($_POST['degrees'], FILTER_SANITIZE_STRING);
    	if ($_POST['degrees'] == "") 
		{
        	$errors['degrees'] = ERR_DEGREES_VALID;
    	}
	} 
	elseif(REQ_degrees == true)
	{
    	$errors['degrees'] = ERR_DEGREES_EMPTY; // This is only necessary if it is a required field
	}

	// sanitize first name
	if ($_POST['fname'] != "") 
	{
    	$_POST['fname'] = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
    	if ($_POST['fname'] == "") 
		{
        	$errors['fname'] = ERR_FNAME_VALID;
    	}
	} 
	elseif(REQ_fname == true)
	{
    	$errors['fname'] = ERR_FNAME_EMPTY; // This is only necessary if it is a required field
	}

	// sanitize middle initial
	if ($_POST['middle_initial'] != "") 
	{
    	$_POST['middle_initial'] = filter_var($_POST['middle_initial'], FILTER_SANITIZE_STRING);
    	if ($_POST['middle_initial'] == "") 
		{
        	$errors['middle_initial'] = ERR_MIDDLE_INITIAL_VALID;
    	}
	} 
	elseif(REQ_middle_initial == true)
	{
    	$errors['middle_initial'] = ERR_MIDDLE_INITIAL_EMPTY; // This is only necessary if it is a required field
	}
	
	// sanitize last name
	if ($_POST['lname'] != "") 
	{
    	$_POST['lname'] = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
    	if ($_POST['lname'] == "") 
		{
        	$errors['lname'] = ERR_LNAME_VALID;
    	}
	} 
	elseif(REQ_lname == true) 
	{
    	$errors['lname'] = ERR_LNAME_EMPTY; // This is only necessary if it is a required field
	}

	// sanitize email
	if ($_POST['email'] != "") 
	{
    	$_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    	if ($_POST['email'] == "") 
		{
        	$errors['email'] = ERR_EMAIL_VALID;
    	}
	} 
	elseif(REQ_email == true) 
	{
    	$errors['email'] = ERR_EMAIL_EMPTY; // This is only necessary if it is a required field
	}
	
	if (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))
	{
		$errors['email'] = ERR_EMAIL_VALID;
	}

	// sanitize preferred email
	if ($_POST['email_preferred'] != "") 
	{
    	$_POST['email_preferred'] = filter_var($_POST['email_preferred'], FILTER_SANITIZE_EMAIL);
    	if ($_POST['email_preferred'] == "") 
		{
        	$errors['email_preferred'] = ERR_EMAIL_VALID;
    	}
	} 
	elseif(REQ_email_preferred == true) 
	{
    	$errors['email_preferred'] = ERR_EMAIL_EMPTY; // This is only necessary if it is a required field
	}
	
	if (!filter_input(INPUT_POST, 'email_preferred', FILTER_VALIDATE_EMAIL))
	{
		$errors['email_preferred'] = ERR_EMAIL_VALID;
	}

	// sanitize phone
	if ($_POST['phone'] != "") 
	{
    	$_POST['phone'] = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    	if ($_POST['phone'] == "") 
		{
        	$errors['phone'] = ERR_PHONE_VALID;
    	}
	} 
	elseif(REQ_phone == true) 
	{
    	$errors['phone'] = ERR_PHONE_EMPTY; // This is only necessary if it is a required field
	}

	// sanitize cell
	if ($_POST['cell'] != "") 
	{
    	$_POST['cell'] = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    	if ($_POST['cell'] == "") 
		{
        	$errors['cell'] = ERR_CELL_VALID;
    	}
	} 
	elseif(REQ_cell == true) 
	{
    	$errors['cell'] = ERR_CELL_EMPTY; // This is only necessary if it is a required field
	}
	
	// sanitize professional titles
	if ($_POST['pro_titles'] != "") 
	{
    	$_POST['pro_titles'] = filter_var($_POST['pro_titles'], FILTER_SANITIZE_STRING);
    	if ($_POST['pro_titles'] == "") 
		{
        	$errors['pro_titles'] = ERR_PROFESSIONAL_TITLES_VALID;
    	}
	} 
	elseif(REQ_professional_titles == true) 
	{
    	$errors['pro_titles'] = ERR_PROFESSIONAL_TITLES_EMPTY; // This is only necessary if it is a required field
	}

	// sanitize specialty.
	if ($_POST['specialty'] != "") 
	{
    	$_POST['specialty'] = filter_var($_POST['specialty'], FILTER_SANITIZE_STRING);
    	if ($_POST['specialty'] == "") 
		{
        	$errors['specialty'] = ERR_SPECIALTY_VALID;
    	}
	} 
	elseif(REQ_specialty == true) 
	{
    	$errors['specialty'] = ERR_SPECIALTY_EMPTY; // This is only necessary if it is a required field
	}

	// sanitize personal address 1
	if ($_POST['addr1'] != "") 
	{
    	$_POST['addr1'] = filter_var($_POST['addr1'], FILTER_SANITIZE_STRING);
    	if ($_POST['addr1'] == "") 
		{
        	$errors['addr1'] = ERR_ADDR1_VALID;
    	}
	} 
	elseif(REQ_addr1 == true) 
	{
    	$errors['addr1'] = ERR_ADDR1_EMPTY; // This is only necessary if it is a required field
	}
	
	// sanitize personalize address 2
	if ($_POST['addr2'] != "") 
	{
    	$_POST['addr2'] = filter_var($_POST['addr2'], FILTER_SANITIZE_STRING);
    	if ($_POST['addr2'] == "") 
		{
        	$errors['addr2'] = ERR_ADDR2_VALID;
    	}
	} 
	elseif(REQ_addr2 == true) 
	{
    	$errors['addr2'] = ERR_ADDR2_EMPTY; // This is only necessary if it is a required field
	}
	
	// sanitize personal city
	if ($_POST['city'] != "") 
	{
    	$_POST['city'] = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
    	if ($_POST['city'] == "") 
		{
        	$errors['city'] = ERR_CITY_VALID;
    	}
	} 
	elseif(REQ_city == true) 
	{
    	$errors['city'] = ERR_CITY_EMPTY; // This is only necessary if it is a required field
	}

	// sanitize personal state
	if ($_POST['state'] != "") 
	{
    	$_POST['state'] = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
    	if ($_POST['state'] == "") 
		{
        	$errors['state'] = ERR_STATE_VALID;
    	}
	} 
	elseif(REQ_state == true) 
	{
    	$errors['state'] = ERR_STATE_EMPTY; // This is only necessary if it is a required field
	}
		
	// sanitize personal zip
	if ($_POST['zip'] != "") 
	{
    	$_POST['zip'] = filter_var($_POST['zip'], FILTER_SANITIZE_STRING);
    	if ($_POST['zip'] == "") 
		{
        	$errors['zip'] = ERR_ZIP_VALID;
    	}
	} 
	elseif(REQ_zip == true) 
	{
    	$errors['zip'] = ERR_ZIP_EMPTY; // This is only necessary if it is a required field
	}

	// payment mailing information

	// sanitize payment mailing address 1
	if ($_POST['pay_addr1'] != "") 
	{
    	$_POST['pay_addr1'] = filter_var($_POST['pay_addr1'], FILTER_SANITIZE_STRING);
    	if ($_POST['pay_addr1'] == "") 
		{
        	$errors['pay_addr1'] = ERR_PAY_ADDR1_VALID;
    	}
	} 
	elseif(REQ_pay_addr1 == true) 
	{
    	$errors['pay_addr1'] = ERR_PAY_ADDR1_EMPTY; // This is only necessary if it is a required field
	}
	
	// sanitize payment mailing 2
	if ($_POST['pay_addr2'] != "") 
	{
    	$_POST['pay_addr2'] = filter_var($_POST['pay_addr2'], FILTER_SANITIZE_STRING);
    	if ($_POST['pay_addr2'] == "") 
		{
        	$errors['pay_addr2'] = ERR_PAY_ADDR2_VALID;
    	}
	} 
	elseif(REQ_pay_addr2 == true) 
	{
    	$errors['pay_addr2'] = ERR_PAY_ADDR2_EMPTY; // This is only necessary if it is a required field
	}
	
	// sanitize payment mailing city
	if ($_POST['pay_city'] != "") 
	{
    	$_POST['pay_city'] = filter_var($_POST['pay_city'], FILTER_SANITIZE_STRING);
    	if ($_POST['pay_city'] == "") 
		{
        	$errors['pay_city'] = ERR_PAY_CITY_VALID;
    	}
	} 
	elseif(REQ_pay_city == true) 
	{
    	$errors['pay_city'] = ERR_PAY_CITY_EMPTY; // This is only necessary if it is a required field
	}

	// sanitize payment mailing state
	if ($_POST['pay_state'] != "") 
	{
    	$_POST['pay_state'] = filter_var($_POST['pay_state'], FILTER_SANITIZE_STRING);
    	if ($_POST['pay_state'] == "") 
		{
        	$errors['pay_state'] = ERR_PAY_STATE_VALID;
    	}
	} 
	elseif(REQ_pay_state == true) 
	{
    	$errors['pay_state'] = ERR_PAY_STATE_EMPTY; // This is only necessary if it is a required field
	}
		
	// sanitize payment mailing zip
	if ($_POST['pay_zip'] != "") 
	{
    	$_POST['pay_zip'] = filter_var($_POST['pay_zip'], FILTER_SANITIZE_STRING);
    	if ($_POST['pay_zip'] == "") 
		{
        	$errors['pay_zip'] = ERR_PAY_ZIP_VALID;
    	}
	} 
	elseif(REQ_zip == true) 
	{
    	$errors['pay_zip'] = ERR_PAY_ZIP_EMPTY; // This is only necessary if it is a required field
	}

	// sanitize organization
	if ($_POST['org_name'] != "") 
	{
    	$_POST['org_name'] = filter_var($_POST['org_name'], FILTER_SANITIZE_STRING);
    	if ($_POST['org_name'] == "") 
		{
        	$errors['org_name'] = ERR_ORG_NAME_VALID;
    	}
	} 
	elseif(REQ_org_name == true) 
	{
    	$errors['org_name'] = ERR_ORG_NAME_EMPTY; // This is only necessary if it is a required field
	}

	// organization information

	// sanitize organization address 1
	if ($_POST['org_addr1'] != "") 
	{
    	$_POST['org_addr1'] = filter_var($_POST['org_addr1'], FILTER_SANITIZE_STRING);
    	if ($_POST['org_addr1'] == "") 
		{
        	$errors['org_addr1'] = ERR_ORG_ADDR1_VALID;
    	}
	} 
	elseif(REQ_org_addr1 == true) 
	{
    	$errors['org_addr1'] = ERR_ORG_ADDR1_EMPTY; // This is only necessary if it is a required field
	}
	
	// sanitize organization 2
	if ($_POST['org_addr2'] != "") 
	{
    	$_POST['org_addr2'] = filter_var($_POST['org_addr2'], FILTER_SANITIZE_STRING);
    	if ($_POST['org_addr2'] == "") 
		{
        	$errors['org_addr2'] = ERR_ORG_ADDR2_VALID;
    	}
	} 
	elseif(REQ_org_addr2 == true) 
	{
    	$errors['org_addr2'] = ERR_ORG_ADDR2_EMPTY; // This is only necessary if it is a required field
	}
	
	// sanitize organization city
	if ($_POST['org_city'] != "") 
	{
    	$_POST['org_city'] = filter_var($_POST['org_city'], FILTER_SANITIZE_STRING);
    	if ($_POST['org_city'] == "") 
		{
        	$errors['org_city'] = ERR_ORG_CITY_VALID;
    	}
	} 
	elseif(REQ_org_city == true) 
	{
    	$errors['org_city'] = ERR_ORG_CITY_EMPTY; // This is only necessary if it is a required field
	}

	// sanitize organization state
	if ($_POST['org_state'] != "") 
	{
    	$_POST['org_state'] = filter_var($_POST['org_state'], FILTER_SANITIZE_STRING);
    	if ($_POST['org_state'] == "") 
		{
        	$errors['org_state'] = ERR_ORG_STATE_VALID;
    	}
	} 
	elseif(REQ_org_state == true) 
	{
    	$errors['org_state'] = ERR_ORG_STATE_EMPTY; // This is only necessary if it is a required field
	}
		
	// sanitize organization zip
	if ($_POST['org_zip'] != "") 
	{
    	$_POST['org_zip'] = filter_var($_POST['org_zip'], FILTER_SANITIZE_STRING);
    	if ($_POST['org_zip'] == "") 
		{
        	$errors['org_zip'] = ERR_ORG_ZIP_VALID;
    	}
	} 
	elseif(REQ_zip == true) 
	{
    	$errors['org_zip'] = ERR_ORG_ZIP_EMPTY; // This is only necessary if it is a required field
	}

	// ***************************************
	// state licensed
	if ($_POST['state_licensed'] != "") 
	{
    	$_POST['state_licensed'] = filter_var($_POST['state_licensed'], FILTER_SANITIZE_STRING);
    	if ($_POST['state_licensed'] == "") 
		{
        	$errors['state_licensed'] = ERR_STATE_LICENSED_VALID;
    	}
	} 
	elseif(REQ_state_licensed == true) 
	{
    	$errors['state_licensed'] = ERR_STATE_LICENSED_EMPTY; // This is only necessary if it is a required field
	}
	
	// license number
	if ($_POST['license_number'] != "") 
	{
    	$_POST['license_number'] = filter_var($_POST['license_number'], FILTER_SANITIZE_STRING);
    	if ($_POST['license_number'] == "") 
		{
        	$errors['license_number'] = ERR_LICENSE_NUMBER_VALID;
    	}
	} 
	elseif(REQ_license_number == true) 
	{
    	$errors['license_number'] = ERR_LICENSE_NUMBER_EMPTY; // This is only necessary if it is a required field
	}

	// hcp nci number
	if ($_POST['hcp_nci_number'] != "") 
	{
    	$_POST['hcp_nci_number'] = filter_var($_POST['hcp_nci_number'], FILTER_SANITIZE_STRING);
    	if ($_POST['hcp_nci_number'] == "") 
		{
        	$errors['hcp_nci_number'] = ERR_HCP_NCI_NUMBER_VALID;
    	}
	} 
	elseif(REQ_hcp_nci_number == true) 
	{
    	$errors['hcp_nci_number'] = ERR_HCP_NCI_NUMBER_EMPTY; // This is only necessary if it is a required field
	}

	// emergency contact name
	if ($_POST['emergency_contact_name'] != "") 
	{
    	$_POST['emergency_contact_name'] = filter_var($_POST['emergency_contact_name'], FILTER_SANITIZE_STRING);
    	if ($_POST['emergency_contact_name'] == "") 
		{
        	$errors['emergency_contact_name'] = ERR_EMERGENCY_CONTACT_NAME_VALID;
    	}
	} 
	elseif(REQ_emergency_contact_name == true) 
	{
    	$errors['emergency_contact_name'] = ERR_EMERGENCY_CONTACT_NAME_EMPTY; // This is only necessary if it is a required field
	}

	// emergency contact phone
	if ($_POST['emergency_contact_phone'] != "") 
	{
    	$_POST['emergency_contact_phone'] = filter_var($_POST['emergency_contact_phone'], FILTER_SANITIZE_STRING);
    	if ($_POST['emergency_contact_phone'] == "") 
		{
        	$errors['emergency_contact_phone'] = ERR_EMERGENCY_CONTACT_PHONE_VALID;
    	}
	} 
	elseif(REQ_emergency_contact_phone == true) 
	{
    	$errors['emergency_contact_phone'] = ERR_EMERGENCY_CONTACT_PHONE_EMPTY; // This is only necessary if it is a required field
	}

	// emergency contact phone
	if ($_POST['emergency_contact_phone'] != "") 
	{
    	$_POST['emergency_contact_phone'] = filter_var($_POST['emergency_contact_phone'], FILTER_SANITIZE_STRING);
    	if ($_POST['emergency_contact_phone'] == "") 
		{
        	$errors['emergency_contact_phone'] = ERR_EMERGENCY_CONTACT_PHONE_VALID;
    	}
	} 
	elseif(REQ_emergency_contact_phone == true) 
	{
    	$errors['emergency_contact_phone'] = ERR_EMERGENCY_CONTACT_PHONE_EMPTY; // This is only necessary if it is a required field
	}

	// emergency contact email
	if ($_POST['emergency_contact_email'] != "") 
	{
    	$_POST['emergency_contact_email'] = filter_var($_POST['emergency_contact_email'], FILTER_SANITIZE_STRING);
    	if ($_POST['emergency_contact_email'] == "") 
		{
        	$errors['emergency_contact_email'] = ERR_EMERGENCY_CONTACT_EMAIL_VALID;
    	}
	} 
	elseif(REQ_emergency_contact_email == true) 
	{
    	$errors['emergency_contact_email'] = ERR_EMERGENCY_CONTACT_EMAIL_EMPTY; // This is only necessary if it is a required field
	}

	// comments
	if ($_POST['comments'] != "") 
	{
    	$_POST['comments'] = filter_var($_POST['comments'], FILTER_SANITIZE_STRING);
    	if ($_POST['comments'] == "") 
		{
        	$errors['comments'] = ERR_COMMENTS_VALID;
    	}
	} 
	elseif(REQ_comments == true) 
	{
    	$errors['comments'] = ERR_COMMENTS_EMPTY; // This is only necessary if it is a required field
	}

	// comments
	if ($_POST['special_needs'] != "") 
	{
    	$_POST['special_needs'] = filter_var($_POST['special_needs'], FILTER_SANITIZE_STRING);
    	if ($_POST['special_needs'] == "") 
		{
        	$errors['special_needs'] = ERR_SPECIAL_NEEDS_VALID;
    	}
	} 
	elseif(REQ_special_needs == true) 
	{
    	$errors['special_needs'] = ERR_SPECIAL_NEEDS_EMPTY; // This is only necessary if it is a required field
	}
	
	return $errors;
	
}
	
// filter for evil
function filter($data) 
{	//Filters data against security risks.
	if (is_array($data)) 
	{
		foreach ($data as $key => $element) 
		{
			$data[$key] = filter($element);
		}
	} 
	else 
	{
		$data = trim(htmlentities(strip_tags($data)));
	
		if(get_magic_quotes_gpc()) $data = stripslashes($data);
	
	}
	return $data;
}

function process_data($arrData)
{

	// NOTE: The event table is pre-filled
	
	// 1) sql connection
	$conn = new mysqli(SRVRNAME, USERNAME, PASSWORD, DATABASE);
	// Check connection
	if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
	} 
	
	$stmt = $conn->stmt_init();
	
	// 2) insert new record into Person
	// Prepared statement, stage 1: prepare 
	if (!($stmt->prepare("INSERT INTO Person(fname,mi,lname,title,degrees,cell,email,preferred_email,addr1,addr2,city,state,zip,pro_titles,specialty,state_licensed,license_number,HCP_NCI_number,Payment_Mailing_Addr_1,Payment_Mailing_Addr_2,Payment_Mailing_City,Payment_Mailing_State,Payment_Mailing_Zip) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))) {
$db_errmsg = "Person Table-INSERT:Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
return $db_errmsg;
	}
	
	// Prepared statement, stage 2: bind and execute 
	if (!$stmt->bind_param("sssssssssssssssssssssss", $arrData['fname'],$arrData['middle_initial'],$arrData['lname'],$arrData['title'],$arrData['degrees'],$arrData['cell'],$arrData['email'],$arrData['email_preferred'],$arrData['addr1'],$arrData['addr2'],$arrData['city'],$arrData['state'],$arrData['zip'],$arrData['pro_titles'],$arrData['specialty'],$arrData['state_licensed'],$arrData['license_number'],$arrData['HCP_NCI_number'],$arrData['pay_addr1'],$arrData['pay_addr2'],$arrData['pay_city'],$arrData[',pay_state'],$arrData['pay_zip'])) 
	{
$db_errmsg = "Person Table-INSERT:Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
return $db_errmsg;
	}
	
	// If error, return to regis page with message, close cxn
	if (!$stmt->execute()) {
$db_errmsg = "Person Table-INSERT:Execute failed: (" . $stmt->errno . ") " . $stmt->error;
return $db_errmsg;
	}
	
	// 3) select new pid from Person table
	if (!($stmt->prepare("SELECT pid FROM Person WHERE email = (?)"))) {
$db_errmsg = "Person Table-SELECT:Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
return $db_errmsg;
	}

	// If error, return to regis page with message, close cxn
	if (!$stmt->bind_param("s", $arrData['email']))
	{
		$db_errmsg = "Person Table-SELECT:Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		return $db_errmsg;
	}

			// If error, return to regis page with message, close cxn
	if (!$stmt->execute()) {
		$db_errmsg = "Person Table-SELECT:Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		return $db_errmsg;
	}
	
	/* bind result variables */
    $stmt->bind_result($pID);
	$stmt->fetch();
	
	
	// 4) select eid from Event table
	if (!($stmt->prepare("SELECT eid FROM Event"))) {
		$db_errmsg = "Event Table-SELECT: Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		return $db_errmsg;
	}

	// If error, return to regis page with message, close cxn
	if (!$stmt->execute()) {
		$db_errmsg = "Event Table-SELECT: Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		return $db_errmsg;
	}
	
	/* bind result variables */
    $stmt->bind_result($eID);
	$stmt->fetch();
	
	// If error, return to regis page with message, close cxn
			
	// 5) insert records into P-E table
	if (!($stmt->prepare("INSERT INTO `Person-Event` (pid,eid,org_name,org_addr1,org_addr2,org_city,org_state,org_zip,emergency_contact_name,emergency_contact_phone,emergency_contact_email,hotel,comments,special_needs,display_name) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))) 
	{
		$db_errmsg = "Person-Event Table-INSERT: Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		return $db_errmsg;
	}


	// Prepared statement, stage 2: bind and execute 
	if (!$stmt->bind_param("iisssssssssssss", $pID,$eID,$arrData['org_name'],$arrData['org_addr1'],$arrData['org_addr2'],$arrData['org_city'],$arrData['org_state'],$arrData['org_zip'],$arrData['emergency_contact_name'],$arrData['emergency_contact_phone'],$arrData['emergency_contact_email'],$arrData['hotel'],$arrData['comments'],$arrData['special_needs'],$arrData['Name_In_Print'])) 
	{
		$db_errmsg = "Person-Event Table-INSERT: Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		return $db_errmsg;
	}

	// If error, return to regis page with message, close cxn
	if (!$stmt->execute()) 
	{
		$db_errmsg = "Person-Event Table-INSERT:Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		return $db_errmsg;
	}
			
	// 6) close connection 
	$stmt->close();
	$conn->close();
	return true;
	
}



?>